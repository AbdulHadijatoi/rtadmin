<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id'
    ];

    protected $with = ['activity'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class, 'subcategory_id');
    }
}