<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('schedule_day_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('time');
            $table->string('photo');
            $table->integer('item_order1');
            $table->timestamps();

            $table->foreign('schedule_day_id')->references('id')->on('schedule_days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
