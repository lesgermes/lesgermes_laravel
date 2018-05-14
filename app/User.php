<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRightsToPerform($action) {
        $userRoles = UsersRoles::Where("user_id", $this->id)->get();

        foreach ($userRoles as $userRole) {
            $roleActions = RolesActions::Where("role_id", $userRole->role_id)->get();

            foreach ($roleActions as $roleAction) {
                $dbAction = Actions::find($roleAction->action_id);

                if ($dbAction == $action) {
                    return true;
                }
            }
        }

        return false;
    }
}
