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
            'email'=> 'required|email'
        ]);
        dd($request);
        $subscriber =new Subscriber();
        $subscriber->email =$request['email'];  
        $subscriber->save();


//        $subscriber = Subscriber::create([
//            'email' => $request->email,
//
//        ]);
//
       Mail::to($subscriber->email)->send(new SubscriptionConfirmationMail());

        return redirect()->back()->with('success', 'You have been subscribed successfully!');
    }
}
