<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'title',
        'highlight',
        'price',
        'adult_price',
        'child_price',
        'category'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}