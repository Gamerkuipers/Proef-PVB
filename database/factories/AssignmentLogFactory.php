<?php

namespace Database\Factories;

use App\Models\Assignment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssignmentLog>
 */
class AssignmentLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'assignment_id' => Assignment::factory(),
            'old_status' => $this->faker->randomElement(['open', 'in behandeling', 'gekoppeld', 'afgesloten', 'afgezegd']),
            'new_status' => $this->faker->randomElement(['open', 'in behandeling', 'gekoppeld', 'afgesloten', 'afgezegd']),
        ];
    }
}
