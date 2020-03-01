<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_additionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('article_id');
            $table->string('article_video')->nullable();
            $table->string('article_img')->nullable();
            $table->string('img_360')->nullable();
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
        Schema::dropIfExists('article_additionals');
    }
}
