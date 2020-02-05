<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('gallery_open')->nullable();
            $table->timestamp('gallery_closed')->nullable();
            $table->string('gallery_name');
            $table->string('gallery_place');
            $table->longText('gallery_description');
            $table->string('gallery_cover');
            $table->string('gallery_img')->nullable();
            $table->string('gallery_img_2')->nullable();
            $table->string('gallery_img_3')->nullable();
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
        Schema::dropIfExists('galleries');
    }
}
