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
        Schema::create('checkins', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('delegate_id')->constrained();
            $table->foreignUlid('checkpoint_id')->constrained();
            $table->foreignUlid('scanned_by')->constrained('users');
            $table->dateTime('checkin_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};
