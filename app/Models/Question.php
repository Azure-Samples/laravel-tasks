<?php
namespace App\Models;

class Question extends Modeli
{

   protected $table = 'questions';
   protected $fillable = [
      'video_id',
      'title',
      'answer_1',
      'answer_2',
      'answer_3',
      'correct_answer'
   ];

   protected $primaryKey = 'id';
}
