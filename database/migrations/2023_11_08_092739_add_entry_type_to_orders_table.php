<?php

use App\Enum\EntryType;
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
        Schema::table('orders', function (Blueprint $table) {
            $table->after("status", function (Blueprint $table) {
                $table->enum("entry_type", ["manual", "automatic"])->default(EntryType::AUTOMATIC->value);
                $table->foreignIdFor(User::class, "created_by")->nullable()->constrained("users")->nullOnDelete();
                $table->timestamp('expires_at')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex("created_by");
            $table->dropColumn(["entry_type", "expires_at"]);
        });
    }
};
