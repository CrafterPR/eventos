<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesaflow_requests', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string("api_client_id")->index();
            $table->string("service_id")->index();
            $table->string("currency");
            $table->decimal("amount_expected");
            $table->json("payload");
            $table->string("invoice_number")->nullable();
            $table->longText("invoice_link")->nullable();
            $table->string("status")->index()->default("pending");
            $table->foreignUlid('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignUlid('order_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesaflow_requests');
    }
};
