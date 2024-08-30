<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends Factory<\App\Models\Model>
 */
class DelegateFactory extends Factory
{

    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        $faker->addProvider(new SalutationProvider($faker));
        return [
            'event_id'=> Event::first()->id,
            'salutation' => $this->faker->salutation(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => $this->faker->phoneNumber(),
            'institution' => $this->faker->company(),
            'user_type' => 'delegate',
            'category_id' => Category::factory()->create(),
            'password' => $this>$faker->password(),
        ];
    }
}
