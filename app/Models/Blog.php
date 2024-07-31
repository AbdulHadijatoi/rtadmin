<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'banner_image'];

    public function contents()
    {
        return $this->hasMany(BlogContent::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}