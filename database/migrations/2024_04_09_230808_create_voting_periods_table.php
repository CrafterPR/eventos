<?php

use App\Models\User;
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
        Schema::create('voting_periods', function (Blueprint $table) {
            $table->uuid()->index();
            $table->string('name');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->cascadeOnDelete();
            $table->time('starts_at')->default('07:00:00');
            $table->time('ends_at')->default('18:00:00');
            $table->enum('status', ['Open', 'Closed', 'Suspended'])->default('Open');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_periods');
    }
};
