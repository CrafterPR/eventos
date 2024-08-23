
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
        Schema::create('coupon_modifications', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('coupon_id')->constrained();
            $table->foreignUlid('user_id')->constrained();
            $table->unsignedInteger('initial_value');
            $table->unsignedInteger('new_value');
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_modifications');
    }
};
