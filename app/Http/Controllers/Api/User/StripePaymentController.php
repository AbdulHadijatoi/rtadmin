<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Stripe\PaymentIntent;

class StripePaymentController extends Controller
{


    public function createPaymentIntent(Request $request)
    {
        //dd($request->all());
        try {
             Stripe::setApiKey(env('STRIPE_SECRET'));


             $intent = \Stripe\PaymentIntent::create([
                 'amount' => $request->price * 100,
                 'currency' => 'aed',
                 'payment_method_types'=>[
                     'card',
                 ],
             ]);
             return response()->json(['clientSecret' => $intent->client_secret]);
        }
         catch (\Exception $e) {
             return response()->json(['error' => $e->getMessage()], 500);
         }

    }

    // public function createPaymentIntent(Request $request)

    // {
    //     try {
    //         $publickey = 'pk_test_51Nl5l2Fd4D0x5hm6bNeeGB3OgSp6LVDsHPSthOuzgiygFol7rB4uUG02e2x1DlTyz48BBGenNM6gd0DJWrozE0cj00b7xF7yx3';
    //         $clientSecret = 'sk_test_51Nl5l2Fd4D0x5hm6Nx1OKK0snF9qYjovaDAraLysgglMKBT0lkl4G8PYGEb6xoc5qdovTvRDgGnUXPKG5wMhIKVs00NNF25eXI';

    //         return response()->json([$clientSecret, $publickey]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }
}