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
        Schema::table('order_items', function (Blueprint $table) {
            $connection = Schema::getConnection();
            $platform = $connection->getDoctrineSchemaManager()->getDatabasePlatform();

            // Modify the ENUM column
            $sql = "ALTER TABLE order_items MODIFY status ENUM('pending', 'paid', 'approved', 'cancelled', 'raised') DEFAULT 'pending'";
            $connection->statement($sql);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
