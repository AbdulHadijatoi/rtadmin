<?php

namespace App\Repositories\User;

use App\Models\GiftCard;
use App\Enums\UserRoleEnums;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Mail\SendVoucherCode;
use App\Interfaces\Api\GiftCardInterface;
use App\Models\Activity;
use Illuminate\Support\Facades\Mail;

class GiftCardRepository implements GiftCardInterface
{
    private $model;

    public function __construct(GiftCard $model)
    {
        $this->model = $model;
    }

    public function sendGift(array $data)
    {
        $code = isset($data['code']) ? isset($data['code']) : Str::random(6);
        $activityId= $data['activity_id'] ?? null;
        $validDate = Carbon::now()->addMonths(3);
        $voucher = $this->model::create([
            'activity_id'    => $activityId,
            'recipient_email'=> $data['recipient_email'],
            'code'           => $code,
            'discount_price' => $data['discount_price'],
            'valid_date'     => $validDate,
            'description'=>$data['description'] ?? null,
        ]);
        
        if($voucher) {
            $activity=null;
            if($activityId !=null) {
                $activity=Activity::findOrFail($data['activity_id']);
            }
            else{
                $activity=null;
            }
            Mail::to($data['recipient_email'])->send(new SendVoucherCode($voucher,$activity));
        }
        return $voucher;
    }

    public function applyVoucher(array $data)
    {
        $voucher = $this->model::where('code', $data['voucher_code'])->first();

        if ($voucher) {
            $currentDate = now();

            if ($currentDate->greaterThan($voucher->valid_date)) {
                return "Voucher is expired";
            } else {
                $newData['price'] = $voucher->discount_price;
                return $newData;
            }
        } else {
            return "Voucher code is invalid";
        }
    }

    public function expireVoucher(array $data)
    {
        $voucher = $this->model::where('code', $data['voucher_code'])->first();

        if ($voucher) {
            $voucher->delete();
            return "Voucher Deleted Successfully";
        } else {
            return "Voucher code is invalid";
        }
    }
}