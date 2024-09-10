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
        Schema::table('delegates', function (Blueprint $table) {
            $table->boolean('has_ticket_type')->after('position')->default(false);
            $table->string('ticket_type', 100)->after('has_ticket_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('delegates', function (Blueprint $table) {
            $table->dropColumn('has_ticket_type');
            $table->dropColumn('ticket_type');
        });
    }
};
