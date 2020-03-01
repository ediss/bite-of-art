<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->longText('srb_article_description')->after('article_description')->nullable();
            $table->longText('esp_article_description')->nullable();
            $table->longText('slo_article_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('srb_article_description');
            $table->dropColumn('esp_article_description');
            $table->dropColumn('slo_article_description');
        });
    }
}
