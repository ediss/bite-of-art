<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_name_srb')->after('event_name')->nullable();
            $table->string('event_name_esp')->after('event_name_srb')->nullable();
            $table->string('event_name_slo')->after('event_name_esp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('event_name_srb');
            $table->dropColumn('event_name_esp');
            $table->dropColumn('event_name_slo');
        });
    }
}
