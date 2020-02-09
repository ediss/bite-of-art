<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artist_name');
            $table->string('artist_cover');
            $table->longText('artist_about');
            $table->string('artist_img_1')->nullable();
            $table->string('artist_img_2')->nullable();
            $table->string('artist_img_3')->nullable();
            $table->string('artist_img_1_desc')->nullable();
            $table->string('artist_img_2_desc')->nullable();
            $table->string('artist_img_3_desc')->nullable();
            $table->string('artist_media')->nullable();
            $table->string('artist_media_desc')->nullable();
            $table->string('artist_note')->nullable();
            $table->integer('event_id')->nullable();
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
        Schema::dropIfExists('artists');
    }
}
