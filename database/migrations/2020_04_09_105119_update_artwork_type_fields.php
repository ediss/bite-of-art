<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateArtworkTypeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->text('artwork_img_1_desc', 8193)->nullable()->change();
            $table->text('artwork_img_2_desc', 8193)->nullable()->change();
            $table->text('artwork_img_3_desc', 8193)->nullable()->change();
            $table->text('artwork_media_desc', 8193)->nullable()->change();
            $table->text('artwork_note', 8193)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->string('artwork_img_1_desc')->nullable()->change();
            $table->string('artwork_img_2_desc')->nullable()->change();
            $table->string('artwork_img_3_desc')->nullable()->change();
            $table->string('artwork_media_desc')->nullable()->change();
            $table->string('artwork_note')->nullable()->change();
        });
    }
}
