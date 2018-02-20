<?php

namespace App\Http\Controllers\Api;

use App\EdenInformation;
use App\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Eden;

class EdenController extends Controller
{
    public function register(Request $request) {
        if (!($request->input("eden_id"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $checkEden = Eden::where("eden_id", $request->input("eden_id"))->First();

        if ($checkEden) {
            return response()->json([
                'error' => "Cet eden est déjà enregistré"
            ], 401);
        }

        $eden = new Eden();
        $eden->eden_id = $request->input("eden_id");
        $eden->save();

        return response()->json([
            'eden' => $eden
        ], 200);
    }

    public function information(Request $request) {
        if (!($request->input("eden_id") && $request->input("light") && $request->input("temperature") && $request->input("water"))) {
            return response()->json([
                'error' => "Erreur formulaire"
            ], 400);
        }

        $eden = Eden::where("eden_id", $request->input("eden_id"))->First();

        if (!$eden) {
            return response()->json([
                'error' => "Cet eden n'est pas enregistré"
            ], 401);
        }

        $edenInfo = new EdenInformation();
        $edenInfo->eden = $eden->id;
        $edenInfo->light = $request->input("light");
        $edenInfo->temperature = $request->input("temperature");
        $edenInfo->water = $request->input("water");
        $edenInfo->save();

        return response()->json([
            'light' => array(
                'start' => new \DateTime(),
                'end' => new \DateTime(),
                'intensity' => 0.9
            ),
            'temperature' => 19
        ], 200);
    }
}
