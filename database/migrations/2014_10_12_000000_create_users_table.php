<?php

use App\Models\Affiliation;
use App\Models\Country;
use App\Models\County;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('salutation')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile', 20)->nullable()->unique();
            $table->string('id_number', 20)->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('institution', 255)->nullable();
            $table->string('disability')->nullable();
            $table->string('position', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type')->default("staff");
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->json('area_of_interest')->nullable();
            $table->foreignIdFor(Affiliation::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Country::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(County::class)->nullable()->constrained()->nullOnDelete();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
