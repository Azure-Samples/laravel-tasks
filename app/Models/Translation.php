<?php
namespace App\Models;

class Translation extends Modeli
{

   protected $table = 'translations';
   protected $fillable = [
      'video_id',
      'tw',
      'jp',
      'start',
      'end'
   ];

   protected $primaryKey = 'id';
}
