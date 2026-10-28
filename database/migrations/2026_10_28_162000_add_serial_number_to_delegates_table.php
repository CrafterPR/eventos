<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('delegates', function (Blueprint $table) {
            $table->string('serial_number')->nullable()->after('type');
            $table->string('certificate_generated_at')->nullable()->after('serial_number');
        });
    }

    public function down(): void
    {
        Schema::table('delegates', function (Blueprint $table) {
            $table->dropColumn('serial_number');
            $table->dropColumn('certificate_generated_at');
        });
    }
};
