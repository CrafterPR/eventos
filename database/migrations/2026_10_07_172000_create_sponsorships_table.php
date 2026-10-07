<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('reference')->unique();
            $table->string('package');
            $table->string('company_name');
            $table->string('physical_address');
            $table->string('company_email');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_mobile');
            $table->decimal('amount', 12, 2);
            $table->string('currency', 3);
            $table->string('status')->default('pending');
            $table->string('transaction_reference')->nullable();
            $table->timestamps();
        });

        Schema::table('pesaflow_requests', function (Blueprint $table) {
            $table->foreignUlid('sponsorship_id')->nullable()->after('purchase_order_id')->constrained()->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pesaflow_requests', function (Blueprint $table) {
            $table->dropConstrainedForeignId('sponsorship_id');
        });

        Schema::dropIfExists('sponsorships');
    }
};
