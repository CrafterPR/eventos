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
        Schema::create('delegates', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('mobile', 20)->nullable();
            $table->string('id_number', 20)->nullable();
            $table->string('gender')->nullable();
            $table->foreignUlid('event_id')->constrained();
            $table->string('organization', 100)->nullable();
            $table->string('position', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->foreignUlid('category_id', 50)->constrained();
            $table->foreignUlid('country_id', 50)->nullable()->constrained()->nullOnDelete();
            $table->foreignUlid('county_id', 50)->nullable()->constrained()->nullOnDelete();
            $table->boolean('pass_printed')->default(false);
            $table->integer('print_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delegates');
    }
};
