<?php
namespace App\Models;

class Video extends Modeli
{

   protected $table = 'videos';
   protected $fillable = [
      'youtube_video_id',
   ];

   protected $primaryKey = 'id';
}
