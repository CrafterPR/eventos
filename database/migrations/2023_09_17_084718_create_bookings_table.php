<?php

use App\Models\Booth;
use App\Models\Order;
use App\Models\OrderItem;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Summit::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Booth::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Order::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(OrderItem::class)->nullable()->constrained()->nullOnDelete();
            $table->string("booking_status")->default("reserved")->index();
            $table->string("payment_status")->default("pending")->index();
            $table->string("confirmation_status")->default("pending")->index();
            $table->timestamp("confirmed_at")->nullable()->index();
            $table->foreignIdFor(User::class, "confirmed_by")->nullable()
                ->constrained("users")
                ->nullOnDelete();
            $table->longText("notes")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
