<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('article_name_srb')->after('article_name')->nullable();
            $table->string('article_name_esp')->after('article_name_srb')->nullable();
            $table->string('article_name_slo')->after('article_name_esp')->nullable();
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
            $table->dropColumn('article_name_srb');
            $table->dropColumn('article_name_esp');
            $table->dropColumn('article_name_slo');
        });
    }
}
