<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {
    
    public function subscribe(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create(['email' => $request->email]);

        return response()->json([
            'message', 'Subscribed successfully!'
        ], 200);
    }
}
