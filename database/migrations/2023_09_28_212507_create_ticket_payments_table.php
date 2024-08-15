<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Summit;
use App\Models\Ticket;
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
        Schema::create('ticket_payments', function (Blueprint $table) {
            $table->id();
            $table->string("serial")->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Summit::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Ticket::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Order::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(OrderItem::class)->nullable()->constrained()->nullOnDelete();
            $table->string("delegate_name")->index();
            $table->string("delegate_email")->nullable()->index();
            $table->string("delegate_organization")->nullable()->index();
            $table->string("payment_status")->default("pending")->index();
            $table->string("confirmation_status")->default("pending")->index();
            $table->timestamp("confirmed_at")->nullable()->index();
            $table->foreignIdFor(User::class, "confirmed_by")->nullable()
                ->constrained("users")
                ->nullOnDelete();
            $table->longText("notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_payments');
    }
};
