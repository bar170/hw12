<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transport>
 */
class TransportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->randomLetter() . $this->faker->randomLetter() . rand(100, 999) . $this->faker->randomLetter(),
            'mark' => $this->faker->text(10),            
            'model' => $this->faker->text(10),
            'color' => $this->faker->colorName,
            'seats' => $this->faker->randomElement([4, 9, 25]),
        ];
    }
}
