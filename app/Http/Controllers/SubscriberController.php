<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionConfirmationMail;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function subscribe(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:subscribers'
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email
        ]);


        Mail::to($subscriber->email)->send(new SubscriptionConfirmationMail());

        return response()->json(['message' => 'Successfully subscribed!']);
    }
}
