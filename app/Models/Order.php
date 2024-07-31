<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'activity_name',
        'title',
        'nationality',
        'phone',
        'date',
        'total_amount',
        'pickup_location',
        'note',
        'status',
        'user_id',
        'reference_id',
    ];

    protected $with = ['orderItems.package.activity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}