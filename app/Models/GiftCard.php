<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'recipient_email',
        'code',
        'discount_price',
        'used_at',
        'valid_date',
        'description',
        'type',
        
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}