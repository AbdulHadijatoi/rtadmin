<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingFindUs extends Model
{
    use HasFactory;
    protected $fillable=[
       'image',
       'header_image',
       'phone',
       'email',
       'whatsapp',
       'address',
       'time_zone',
       'booking_email',
       'business_email',
       'press_email',
       'general_email',
    ];
}