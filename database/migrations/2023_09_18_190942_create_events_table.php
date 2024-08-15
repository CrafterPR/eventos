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
            $table->string('title');
            $table->foreignId('programme_id')->constrained();
            $table->foreignId('schedule_id')->nullable()->constrained();
            $table->foreignId('speaker_id')->nullable()->constrained();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->json('tags')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE events AUTO_INCREMENT = 40');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
