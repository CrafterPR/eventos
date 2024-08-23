<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('webhook_calls', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('url');
            $table->json('headers')->nullable();
            $table->json('payload')->nullable();
            $table->text('exception')->nullable();
            $table->boolean('processed')->default(false);
            $table->bigInteger('retry')->default(0);
            $table->timestamps();
        });
    }
};
