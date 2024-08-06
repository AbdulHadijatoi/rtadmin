<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class SubscriptionController extends Controller {

    public function index() {
        $subscribers = Subscriber::all();
        return view('admin.modules.subscription.index', compact('subscribers'));
    }
}
