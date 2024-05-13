<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male','female']);

        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName($gender),
            'birth_date' => fake()->date,
            'gender' => $gender == "male" ? "M" : 'F',
            'address' => fake()->address,
            'phone' => fake()->phoneNumber(),
            'height' => fake()->numberBetween(100,200),
            'weight' => fake()->numberBetween(40,150),
            'case_no' => fake()->bothify('???####')
        ];
    }
}
