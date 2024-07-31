<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\Api\User\HelpRequest;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;

class HelpController extends Controller
{
    use ResponseTrait;
    public function helpGet(HelpRequest $request)
    {


        $help = Order::where('email', $request->email)
            ->where('reference_id', $request->booking_ref_no)
            ->get();

        if ($help->isEmpty()) {
            return response()->json(['success', 'Booking Detail not found']);
        } else {
            return $this->sendResponse($help, 'Get Your Information Successfully');
        }


    }






}
