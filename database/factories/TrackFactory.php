<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'album_id' => Album::factory(),
            'position' => $this->faker->unique()->randomDigit,
            'name' => $this->faker->unique()->text(20),
            'duration' => $this->faker->asciify('03:00')
        ];
    }
}
