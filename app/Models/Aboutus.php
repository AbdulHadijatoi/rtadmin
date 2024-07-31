<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'image_url',
        'header_image',
        'header_image_url'
    ];
}