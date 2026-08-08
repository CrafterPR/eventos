<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reference')->unique();
            $table->string('payment_method')->nullable();
            $table->string('payment_email')->nullable();
            $table->string('payment_phone')->nullable();
            $table->json('tickets')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_reference')->nullable();
            $table->enum('status', ['new', 'paid', 'cancelled', 'failed'])->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
