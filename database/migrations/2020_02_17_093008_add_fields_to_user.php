<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gallery_name')->nullable();
            $table->string('city_country')->nullable();
            $table->string('gallery_cover')->nullable();
            $table->longText('about_gallery')->nullable();
            $table->string('website')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->boolean('approved')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gallery_name');
            $table->dropColumn('city_country');
            $table->dropColumn('gallery_cover');
            $table->dropColumn('about_gallery');
            $table->dropColumn('website');
            $table->dropColumn('cover_letter');
            $table->dropColumn('approved');
        });
    }
}
