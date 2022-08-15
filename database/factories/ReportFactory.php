<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department' => $this->faker->sentence(),
            'report_name' => 'active encounters',
            // 'requested_by' => $this->faker->company()
            'requested_by' => $this->faker->department()
        ];
    }
}
