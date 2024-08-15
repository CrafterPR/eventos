<?php

use App\Models\Summit;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("reference")->unique()->index();
            $table->unsignedBigInteger("service_code")->index();
            $table->foreignIdFor(Summit::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->string("currency")->default("KES");
            $table->decimal("items_total", 13)->nullable();
            $table->decimal("tax_total")->default(0);
            $table->decimal("convenience_fee")->default(0);
            $table->decimal("total_amount", 13)->nullable();
            $table->longText("notes")->nullable();
            $table->string("payment_method")->nullable();
            $table->timestamp("check_out_completed_at")->nullable();
            $table->timestamp("receipt_sent_at")->nullable();
            $table->timestamp("invoice_sent_at")->nullable();
            $table->string("status")->index()->default("pending");
            $table->foreignIdFor(User::class, "payment_verified_by")->nullable()
                ->constrained("users")
                ->nullOnDelete();
            $table->timestamp("payment_verified_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
