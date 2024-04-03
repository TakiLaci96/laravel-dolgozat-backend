<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dog>
 */
class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $genders = ["kan", "szuka"];

        return [
            "name" => fake()-> word(),
            "gender" => fake()-> randomElement($genders),
            "age" => fake()-> numberBetween(0, 20),
            "has_owner" => fake()-> numberBetween(0, 1)
        ];
    }
}
