<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateArtistTypeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->text('artist_img_1_desc', 8193)->nullable()->change();
            $table->text('artist_img_2_desc', 8193)->nullable()->change();
            $table->text('artist_img_3_desc', 8193)->nullable()->change();
            $table->text('artist_media_desc', 8193)->nullable()->change();
            $table->text('artist_note', 8193)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->string('artist_img_1_desc')->nullable()->change();
            $table->string('artist_img_2_desc')->nullable()->change();
            $table->string('artist_img_3_desc')->nullable()->change();
            $table->string('artist_media_desc')->nullable()->change();
            $table->string('artist_note')->nullable()->change();
        });
    }
}
