<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameEventsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->renameColumn('event_description', 'event_description_en');
            $table->renameColumn('srb_event_description', 'event_description_srb');
            $table->renameColumn('esp_event_description', 'event_description_esp');
            $table->renameColumn('slo_event_description', 'event_description_slo');

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
            $table->renameColumn('event_description_en','event_description');
            $table->renameColumn('event_description_srb','srb_event_description');
            $table->renameColumn('event_description_esp','esp_event_description');
            $table->renameColumn('event_description_slo', 'slo_event_description');
        });
    }
}
