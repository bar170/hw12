<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\State;
use App\Models\Passenger;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PassengerState>
 */
class PassengerStateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $states = config('seed.states_event');
        $randomState = collect($states)->random();
        return [
            'event_id' => Passenger::inRandomOrder()->firstOrFail(),
            'state_id' => State::where('name', $randomState['name']),
        ];
    }
}
