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
                'start' => \DateTime::createFromFormat('H:i:s', '08:00:00'),
                'end' => \DateTime::createFromFormat('H:i:s', '21:00:00'),
                'intensity' => 0.9
            ),
            'temperature' => 19
        ], 200);
    }

    public function registerEden(Request $request) {
        if (!($request->input("eden_id"))) {
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

        if ($eden->owner_id !== null) {
            return response()->json([
                'error' => "Cet eden appartient déjà à un utilisateur"
            ], 402);
        }

        $eden->owner_id = $request->user()->id;
        $eden->save();

        return response()->json($eden, 200);
    }

    public function getUserEdens(Request $request) {
        $user = $request->user();

        $edens = Eden::where('owner_id', $user->id)->get();

        foreach ($edens as $eden) {
            $edenInfo = EdenInformation::where('eden', $eden->id)->orderBy('created_at', 'desc')->first();
            $eden->info = $edenInfo;
        }

        return response()->json($edens, 200);
    }
}
