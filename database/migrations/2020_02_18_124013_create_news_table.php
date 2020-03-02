<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('article_name');
            $table->timestamp('article_open')->nullable();;
            $table->timestamp('article_closed')->nullable();;
            $table->string('article_cover');
            $table->longText('article_description');
            $table->string('article_media')->nullable();
            $table->string('article_media_desc')->nullable();
            $table->string('article_note')->nullable();
            $table->integer('user_id');
            $table->boolean('approved')->default(0);
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
        Schema::dropIfExists('news');
    }
}
