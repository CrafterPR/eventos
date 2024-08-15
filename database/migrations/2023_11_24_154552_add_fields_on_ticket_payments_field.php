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
        Schema::table('ticket_payments', function (Blueprint $table) {
            $table->string('reference')->after('confirmed_by')->nullable();
            $table->string('mode', 30)->after('reference')->nullable();
            $table->string('paid_by', 30)->after('mode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_payments', function (Blueprint $table) {
            //
        });
    }
};
