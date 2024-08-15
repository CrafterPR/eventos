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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Summit::class)->constrained()->cascadeOnDelete();
            $table->string("title");
            $table->text("covers")->nullable();
            $table->bigInteger("priority")->default(0);
            $table->bigInteger("days");
            $table->bigInteger("persons")->default(1);
            $table->decimal("kes_amount");
            $table->decimal("usd_amount");
            $table->string("status")->default("active");
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
        Schema::dropIfExists('ticket_types');
    }
};
