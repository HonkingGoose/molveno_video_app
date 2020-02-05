<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('youtube_uid', 21844)->unique();
            $table->string('title', 21844);
            $table->string('description', 21844);
            $table->string('category', 21844);
            $table->smallInteger('reviews');
            $table->boolean('available_to_watch');
            $table->string('created_by', 21844);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
