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
        Schema::create('active_votes', function (Blueprint $table) {
            $table->uuid();
            $table->foreignUuid('voter_uuid')->constrained('voters', 'uuid');
            $table->foreignUuid('contestant_uuid')->constrained('contestants', 'uuid');
            $table->foreignUuid('voting_position_uuid')->constrained('voting_positions', 'uuid');
            $table->enum('vote_status', ['Valid', 'Invalid'])->default('Valid');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_votes');
    }
};
