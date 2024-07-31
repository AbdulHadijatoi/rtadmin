<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityInstruction extends Model
{
    use HasFactory;
    protected $fillable=['instruction_title','instruction_description','activity_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }


}