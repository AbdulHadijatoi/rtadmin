<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'adult',
        'child',
        'infant',
        'package_title',
        'total_price',
        'package_category',
        'package_id',
        'order_id'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}