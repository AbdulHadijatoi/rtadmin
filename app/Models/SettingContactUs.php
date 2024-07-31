<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingContactUs extends Model
{
    use HasFactory;
    protected $fillable=[
        'phone',
        'email',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'image',
    ];
}