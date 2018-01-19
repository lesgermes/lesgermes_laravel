<?php

namespace App\Http\Controllers;

use App\UserMessage;
use Illuminate\Http\Request;
use App\Subscriber;

class DefaultController extends Controller
{
    public function adoptEden(Request $request) {
        if (!$request->input("email")) {
            return response()->json("Adresse email manquante", 400);
        }

        $subscriber = Subscriber::where("email", $request->input("email"))->First();

        if ($subscriber && $subscriber->adoptEden == true) {
            return response()->json("Cette adresse mail a déjà été enregistrée.", 400);
        } else if (!$subscriber) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->input("email");
            $subscriber->contact = false;
        }

        $subscriber->adoptEden = true;

        $subscriber->save();

        return response()->json("Merci pour votre intérêt. Nous prendrons contact avec vous très prochainement.", 200);
    }

    public function contact(Request $request) {
        if (!$request->input("email") || !$request->input("name") || !$request->input("message")) {
            return response()->json("Formulaire incomplet", 400);
        }

        $subscriber = Subscriber::where("email", $request->input("email"))->First();

        if (!$subscriber) {
            $subscriber = new Subscriber();
            $subscriber->email = $request->input("email");
            $subscriber->adoptEden = false;
        }

        $subscriber->contact = true;

        $subscriber->save();

        $userMessage = new UserMessage();
        $userMessage->name = $request->input("name");
        $userMessage->email = $request->input("email");
        $userMessage->message = $request->input("message");
        if ($request->input("website"))
            $userMessage->website = $request->input("website");
        $userMessage->subscriber_id = $subscriber->id;

        $userMessage->save();

        return response()->json("Merci pour votre intérêt. Nous prendrons contact avec vous très prochainement.", 200);
    }
}
