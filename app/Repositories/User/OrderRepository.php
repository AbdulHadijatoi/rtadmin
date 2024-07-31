<?php

namespace App\Repositories\User;

use App\Enums\UserRoleEnums;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Mail\cancelBooking;
use App\Mail\SendCredentials;
use Illuminate\Support\Facades\Mail;
use Str;
use App\Models\OrderItem;
use App\Models\Package;
use Illuminate\Support\Facades\Hash;

class OrderRepository
{
    public function storeOrder(array $data)
    {
        $reference_id = Str::random(7);
        if(Auth::check())
        {
            $userId=Auth::id();
        }else{
            $user = User::where('email',$data['email'])->first();
            $isNewUser = false;
            if(!$user){
                $user = User::create([
                    'first_name'   => $data['first_name'],
                    'last_name'    => $data['last_name'],
                    'email'        => $data['email'],
                    'password'     => Hash::make($reference_id),
                    'original_password' => $reference_id,
                    'phone'        => $data['phone'],
                ]);
                $isNewUser = true;
            }
            if($user && $isNewUser){
                $user->assignRole(UserRoleEnums::USER);
                $userId = $user->id;

                //send email to user with login credentials
                Mail::to($user->email)->send(new SendCredentials($user->email,$user->original_password));
            }
        }

        // Create the order in the database
        $reference_id = Str::random(7);
        $orderDetail = Order::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'reference_id'=>isset($data['reference_id']) ? $data['reference_id'] : $reference_id,
            'activity_name' => $data['activity_name'],
            'title' => $data['title'],
            'nationality' => $data['nationality'],
            'phone' => $data['phone'],
            'date' => $data['date'],
            'total_amount' => $data['total_amount'],
            'pickup_location' => $data['pickup_location'],
            'note' => $data['note'],
            'status' => $data['payment'],
            'user_id'=>$userId ?? null,
        ]);
        //dd( $orderDetail);
        if ($data['package_details'] && is_array($data['package_details'])) {
            foreach ($data['package_details'] as $item) {
                $packageId = $item['package_id'] ?? null;
                $package=Package::findOrFail($packageId);
               OrderItem::create([
                    'adult'=> $item['adult'] ?? null,
                    'child'=>$item['child'] ?? null,
                    'infant'=>$item['infant'] ?? null,
                    'total_price'=>$item['price'] ?? null,
                    'package_title'=>$package->title,
                    'package_category'=>$package->category,
                    'package_id'=>$packageId,
                    'order_id'=>$orderDetail->id,
                ]);


            }
        }


        return $orderDetail;
    }
    public function index()
    {
        $user = Auth::user();

        if ($user->bookings()->exists()) {
            $data = $user->bookings()->get();
            return $data;
        } else {
            $email = $user->email;
            $bookings = Order::where('email', $email)->get();
            return $bookings;
        }
    }

    public function update(array $data,$id)
    {
        $order=Order::findOrFail($id);
        $order->update([
            'date'=>$data['date'] ?? $order->date,
        ]);
        return $order;
    }
    
    public function updateStatus(array $data,$reference_id) {
        $order=Order::where('reference_id',$reference_id)->first();
        $order->update([
            'status'=>$data['status'] ?? $order->status,
        ]);
        return $order;
    }

    public function cancel($id)
    {
        $order=Order::findOrFail($id);
        $oderItem=$order->orderItems->first();
        $package=$oderItem->package;
        $activity=$package->activity;
        $duration=$activity->cancellation_duration;
        $createdAt = Carbon::parse($order->created_at);
        $currentDate = now();
        $hoursDifference = $createdAt->diffInHours($currentDate);

        if($hoursDifference <= $duration)
        {
            $order->update([
                'status'=>"canceled",
            ]);
            $adminEmail = User::where('id', 1)->pluck('email')->first();

            Mail::to($order->email)->send(new cancelBooking($order));
            Mail::to($adminEmail)->send(new cancelBooking( $order));
            return "Booking Canceled successfully";
        }
        else{
            return "you can not cancel booking";
        }

    }
}