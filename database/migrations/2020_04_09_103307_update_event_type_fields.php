<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventTypeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('event_img_1_desc', 8193)->nullable()->change();
            $table->text('event_img_2_desc', 8193)->nullable()->change();
            $table->text('event_img_3_desc', 8193)->nullable()->change();
            $table->text('event_media_desc', 8193)->nullable()->change();
            $table->text('event_note', 4097)->nullable()->change();
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
            $table->string('event_img_1_desc')->nullable()->change();
            $table->string('event_img_2_desc')->nullable()->change();
            $table->string('event_img_3_desc')->nullable()->change();
            $table->string('event_media_desc')->nullable()->change();
            $table->string('event_note')->nullable()->change();
        });
    }
}
