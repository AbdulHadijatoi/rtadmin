<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Mail\SendPasswordResetLink;
use App\Mail\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'original_password',
        'phone',
        'visa_status',
        'instagram',
        'facebook',
        'twitter',
        'profile_image',
        'profile_image_url'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];



    public function CustomResetPasswordNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeupdateProfile($query,$userId,$data){
        $user=$query->find($userId);
        $user->fill([
            'first_name' => $data['first_name'],
            'email' => $data['email'],
        ]);
        $user->save();
        return $user;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }


    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function bookings()
    {
        return $this->hasMany(Order::class);
    }
}