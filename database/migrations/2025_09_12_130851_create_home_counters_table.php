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
        Schema::create('home_counters', function (Blueprint $table) {
            $table->id();
            $table->string('item1_icon');
            $table->integer('item1_number');
            $table->string('item1_title');
            $table->string('item2_icon');
            $table->integer('item2_number');
            $table->string('item2_title');
            $table->string('item3_icon');
            $table->integer('item3_number');
            $table->string('item3_title');
            $table->string('item4_icon');
            $table->integer('item4_number');
            $table->string('item4_title');
            $table->enum('status', ['show', 'hide'])->default('show');
            $table->string('background')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_counters');
    }
};
