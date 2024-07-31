<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image'
    ];

    

    protected $with = ['subCategory', 'activity'];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}