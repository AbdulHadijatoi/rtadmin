<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class BookingController extends Controller
{
    public function index()
    {
        $data = Order::all();
        return view('admin.modules.booking.index', compact('data'));
    }
    public function package($id)
    {
        $booking = Order::findOrFail($id);
        $data = $booking->orderItems;
        return view('admin.modules.booking.package', compact('data'));
    }

   
}