<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = config('seed.states');
        foreach ($states as $state) {
            State::factory()->create([
                'name' => $state['name'],
                'description' => $state['description'],
            ]);
        }
    }
}
