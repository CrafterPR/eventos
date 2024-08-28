<?php

namespace Database\Factories;

use App\Enum\UserType;
use App\Models\Category;
use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salutation' => fake()->randomElement(config("setting.salutation")),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => "2547" . rand(10000000, 99999999),
            'id_number' => rand(10000000, 99999999),
            'institution' => fake()->domainWord(),
            'country_id' => Country::query()->inRandomOrder()->first()->id,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'position' => fake()->jobTitle(),
            'gender' => fake()->randomElement(["Male", "Female"]),
            'disability' => fake()->randomElement(["Yes", "No"]),
            'email_verified_at' => now(),
            'password' => bcrypt("password"),
            'remember_token' => Str::random(10),
            'user_type' => fake()->randomElement(UserType::cases())
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            if (in_array($user->user_type->value, [UserType::DELEGATE->value, UserType::EXHIBITOR->value])) {
               // $user->assignRole($user->user_type->value);
            } else {
                $role = Role::inRandomOrder()->first();
                $user->assignRole($role);
            }
        });
    }
}
