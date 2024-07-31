<?php

namespace App\Models;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ActivityPicture extends Model
{
    use HasFactory;
    protected $fillable=[
        'activity_id',
        'original_filename',
        'filename',
  ];

  public const UPLOADS_IMAGE_PATH = 'uploads/gallery/';

  protected $appends = ['image_url'];




  protected function imagePath(): Attribute
  {
      $path = '';
      $filePath = self::UPLOADS_IMAGE_PATH.$this->image;
          $path = asset(self::UPLOADS_IMAGE_PATH.$this->filename);

      return new Attribute(function () use ($path) {
          return $path;
      });
  }

  public function getImageUrlAttribute()
  {
      return $this->imagePath;
  }

  public function activityImages(){
    return $this->belongsTo(Activity::class,'activity_id');
   }

}