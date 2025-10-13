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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('venue')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->enum('status', ['Draft', 'Published', 'Completed', 'Cancelled'])->default('Draft');
            $table->boolean('is_featured')->default(false);
            $table->integer('max_attendees')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->text('tags')->nullable();
            $table->string('organizer_name')->nullable();
            $table->string('organizer_email')->nullable();
            $table->string('organizer_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
