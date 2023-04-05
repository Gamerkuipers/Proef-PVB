<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company(),
            'company_description' => $this->faker->paragraph(),
            'email' => $this->faker->companyEmail(),
            'examples' => $this->faker->url(),
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraphs(2, true),
            'target_audience' => $this->faker->word(),
            'deadline' => $this->faker->dateTime(),
            'phone_numbers' => $this->faker->phoneNumber()
        ];
    }
}
