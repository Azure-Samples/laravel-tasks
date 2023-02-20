<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('video_id')->comment('對應的影片ID');
            $table->string('jp')->comment('原始日文內容');
            $table->string('tw')->comment('翻譯過的中文內容');
            $table->float('start', 10, 3)->comment('起始秒數');
            $table->float('end', 10, 3)->comment('結束秒數');
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
        Schema::dropIfExists('translations');
    }
}
