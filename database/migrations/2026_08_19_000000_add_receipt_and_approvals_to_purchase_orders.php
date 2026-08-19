<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->string('payment_receipt')->nullable()->after('transaction_reference');
            $table->foreignUlid('approved_by')->nullable()->constrained('users')->nullOnDelete()->after('payment_receipt');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
        });
    }

    public function down(): void
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropColumn(['payment_receipt', 'approved_by', 'approved_at']);
        });
    }
};
