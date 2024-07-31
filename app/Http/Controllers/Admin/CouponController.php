<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CouponMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Api\User\GiftCardRequest;
use Str;
use Carbon\Carbon;
use App\Models\GiftCard;
use App\Models\Activity;


class CouponController extends Controller
{
  
    public function index()
    {
        $data = GiftCard::where('type', 'coupon')->get();
        return view('admin.modules.coupon.index', compact('data'));
    }

    public function create(){
        return view('admin.modules.coupon.create');
    }
    public function sendCoupon(GiftCardRequest $request)
    {

        $activityId= $request->activity_id ?? null;
        $validDate = Carbon::now()->addMonths(3);
        $voucher = GiftCard::create([
            'activity_id'    => $activityId,
            'code'           => $request->voucher_code,
            'discount_price' => $request->discount_price,
            'valid_date'     => $validDate,
            'type'=>'coupon',
            // 'recipient_email'=> $request->recipient_email,
            // 'description'=>$request->description ?? null,
          
            
        ]);
        if($voucher)
        {
          
            // Mail::to($request->recipient_email)->send(new CouponMail($request->recipient_email, $request->description, $request->discount_price, $request->voucher_code));
            return redirect()->route('admin.couponIndex');
        }
    }

    public function destroy($id)
    {
        $data=GiftCard::findOrFail($id);
        $data->delete();
        return back()->with('success','Review deleted successfully');
    }


}
