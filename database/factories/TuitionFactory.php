<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tuition>
 */
class TuitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                "user_id" => rand(0, 10),
                "created_at" => now()->subMonth(1),
                "updated_at" => now()->subMonth(1)
            ];
    }
}
