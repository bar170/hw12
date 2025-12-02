<?php

namespace Database\Factories;

use App\Models\Company;
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
            'number' => $this->faker->bothify('?###??'),
            'mark' => $this->faker->word(),            
            'model' => $this->faker->words(2, true),
            'color' => $this->faker->colorName,
            'seats' => $this->faker->randomElement([4, 9, 25]),
            'company_id' => Company::inRandomOrder()->firstOrFail()->id,
        ];
    }
}
