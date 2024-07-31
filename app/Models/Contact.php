<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'email',
        'company_name',
        'inquiry_topic',
        'mobile',
        'message',
        'status'
    ];
}
