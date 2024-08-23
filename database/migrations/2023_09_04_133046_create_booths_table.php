<?php

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
        Schema::create('booths', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string("label")->index();
            $table->string("uuid")->unique();
            $table->decimal("kes_price")->nullable();
            $table->decimal("usd_price")->nullable();
            $table->string("row_name")->nullable();
            $table->bigInteger("room_no")->nullable();
            $table->string("room_size")->nullable();
            $table->string("room_size_per_sqm")->nullable();
            $table->boolean("open_to_public")->default(true);
            $table->string("category")->nullable();
            $table->string("status")->default("active")->index();
            $table->longText("description")->nullable();
            $table->json("meta")->nullable();
            $table->foreignIdFor(User::class, "created_by")->nullable()
                ->constrained("users")
                ->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booths');
    }
};
