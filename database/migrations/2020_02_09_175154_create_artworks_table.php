<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artwork_name');
            $table->string('artwork_cover');
            $table->longText('artwork_about');
            $table->string('artwork_img_1')->nullable();
            $table->string('artwork_img_2')->nullable();
            $table->string('artwork_img_3')->nullable();
            $table->string('artwork_img_1_desc')->nullable();
            $table->string('artwork_img_2_desc')->nullable();
            $table->string('artwork_img_3_desc')->nullable();
            $table->string('artwork_media')->nullable();
            $table->string('artwork_media_desc')->nullable();
            $table->string('artwork_note')->nullable();
            $table->integer('event_id')->nullable();
            $table->integer('artist_id')->nullable();
            $table->string('nfc_tag');
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
        Schema::dropIfExists('artworks');
    }
}
