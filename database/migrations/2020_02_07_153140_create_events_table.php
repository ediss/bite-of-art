<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->timestamp('event_open')->nullable();;
            $table->timestamp('event_closed')->nullable();;
            $table->string('event_cover');
            $table->string('event_place');
            $table->longText('event_description');
            $table->longText('srb_event_description')->nullable();
            $table->longText('esp_event_description')->nullable();
            $table->longText('slo_event_description')->nullable();
            $table->string('event_img_1')->nullable();
            $table->string('event_img_2')->nullable();
            $table->string('event_img_3')->nullable();
            $table->string('event_img_1_desc')->nullable();
            $table->string('event_img_2_desc')->nullable();
            $table->string('event_img_3_desc')->nullable();
            $table->string('event_media')->nullable();
            $table->string('event_media_desc')->nullable();
            $table->string('event_note')->nullable();
            $table->integer('gallerist_id');
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
        Schema::dropIfExists('events');
    }
}
