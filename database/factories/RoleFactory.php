<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // отдельный faker для английского
        $fakerEn = \Faker\Factory::create('en_US');
        // отдельный faker для русского
        $fakerRu = \Faker\Factory::create('ru_RU');
        return [
            'name' => strtolower($fakerEn->unique()->jobTitle),
            'description' => $fakerRu->realText(50),
            'rights' => rand(1, 9),
        ];
    }
}
