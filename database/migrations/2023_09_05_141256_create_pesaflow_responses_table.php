<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesaflow_responses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string("invoice_number")->index();
            $table->string("client_invoice_ref")->index();
            $table->string("status")->index();
            $table->string("currency")->nullable();
            $table->string("invoice_amount")->nullable();
            $table->string("name")->nullable();
            $table->string("phone_number")->nullable();
            $table->decimal("amount_paid")->nullable();
            $table->decimal("amount_expected")->nullable();
            $table->decimal("last_payment_amount")->nullable();
            $table->string("payment_channel")->index()->nullable();
            $table->string("transaction_reference")->index()->nullable();
            $table->timestamp("payment_date")->nullable();
            $table->json("payment_reference")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesaflow_responses');
    }
};
