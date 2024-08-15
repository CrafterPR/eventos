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
        Schema::create('event_summits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('lead_organization')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('leader')->nullable();
            $table->string('leader_contact')->nullable();
            $table->mediumText('leader_bio')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_summits');
    }
};
