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
        Schema::create('contestants', function (Blueprint $table) {
            $table->uuid()->index();
            $table->string('full_name');
            $table->foreignUuid('voting_period_uuid')->constrained('voting_periods', 'uuid');
            $table->foreignUuid('voting_position_uuid')->constrained('voting_positions', 'uuid');
            $table->foreignId('created_by')->constrained('users');
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contestants');
    }
};
