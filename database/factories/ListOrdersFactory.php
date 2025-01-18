<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListOrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_order' => $this->faker->sentence(6, true),
            'description_task' => $this->faker->paragraph(5, true),
            'budget' => $this->faker->numberBetween(1000, 100000),
            'when_ready' => $this->faker->date(),
            'working_with_team' => $this->faker->boolean(),
            'working_with_freelancer' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
