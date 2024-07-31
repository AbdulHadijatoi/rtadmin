<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id', 'question', 'answer'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}