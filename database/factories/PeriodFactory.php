<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'course_id' => 1,
            'week_day' => 'Sunday',
            'class_time' => '10:00',
            'end_date' => $this->faker->date,
            'class_date' => $this->faker->date,
        ];
    }
}
