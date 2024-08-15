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
        Schema::create('summits', function (Blueprint $table) {
            $table->id();
            $table->string("title")->index();
            $table->string("slug");
            $table->string("edition_title")->nullable();
            $table->string("edition_description")->nullable();
            $table->string("theme")->nullable();
            $table->string("short_description")->nullable();
            $table->longText("long_description")->nullable();
            $table->string("banner_type")->default("video");
            $table->string("banner_url")->nullable();
            $table->timestamp("start_date")->nullable();
            $table->timestamp("end_date")->nullable();
            $table->string("venue")->nullable();
            $table->string("status")->default("draft");
            $table->json("meta")->nullable();
            $table->foreignIdFor(User::class, "created_by")->nullable()
                ->constrained("users")
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forums');
    }
};
