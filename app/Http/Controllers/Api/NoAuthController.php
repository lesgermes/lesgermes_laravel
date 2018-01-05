<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class NoAuthController extends Controller
{
    public function login(Request $request) {
        if (!($request->input("email") && $request->input("password"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $user = User::where("email", $request->input("email"))->First();

        if (!$user) {
            return response()->json([
                'error' => "l'adresse email renseignée n'exite pas dans notre base de donnée"
            ], 401);
        }

        if (!Hash::check($request->input("password"), $user->password)) {
            return response()->json([
                'error' => "Mot de passe incorrect"
            ], 402);
        }

        $client = Client::where("user_id", $user->id)->First();
        $clientSecret = $client->secret;
        return response()->json([
            'user' => $user,
            'client' => $client,
            'client_secret' => $clientSecret,
            'password' => $request->input("password")
        ], 200);
    }

    public function register(Request $request) {
        if (!($request->input("name") && $request->input("email") && $request->input("password"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $checkUser = User::where("email", $request->input("email"))->First();

        if ($checkUser) {
            return response()->json([
                'error' => "Un utilisateur utilisant cette adresse email existe déjà"
            ], 401);
        }

        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();

        $clientRep = new ClientRepository();
        $client = $clientRep->create($user->id, "Api-".str_random(), "", false, true);

        return response()->json([
            'user' => $user,
            'client' => $client
        ], 200);
    }
}
