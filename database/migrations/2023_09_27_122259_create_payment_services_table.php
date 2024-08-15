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
        Schema::create('payment_services', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->unsignedBigInteger("code")->index();
            $table->string("category");
            $table->foreignIdFor(Summit::class)->constrained()->cascadeOnDelete();
            $table->string("agency");
            $table->string("type");
            $table->string("currency");
            $table->string("bank_name")->nullable();
            $table->string("bank_account_no")->nullable();
            $table->string("bank_branch")->nullable();
            $table->string("status")->default("active");
            $table->foreignIdFor(User::class, "created_by")
                ->nullable()
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
        Schema::dropIfExists('payment_services');
    }
};
