<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('問題');
            $table->integer('video_id')->comment('對應的video');
            $table->string('answer_1')->comment('答案選項');
            $table->string('answer_2')->comment('答案選項');
            $table->string('answer_3')->comment('答案選項');
            $table->string('correct_answer')->comment('正確答案選項');
            $table->boolean('status')->default(0)->comment('校對狀態, default:尚未校對完成');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
