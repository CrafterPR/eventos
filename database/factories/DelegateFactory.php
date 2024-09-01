<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Country;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Model>
 */
class DelegateFactory extends Factory
{

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
            'salutation' => fake()->randomElement(config("setting.salutation")),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => "2547" . rand(10000000, 99999999),
            'id_number' => rand(10000000, 99999999),
            'organization' => fake()->domainWord(),
            'country_id' => Country::query()->inRandomOrder()->first()->id,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'position' => fake()->jobTitle(),
            'gender' => fake()->randomElement(["Male", "Female"]),

        ];
    }
}
