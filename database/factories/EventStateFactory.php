<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventState>
 */
class EventStateFactory extends Factory
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
            'event_id' => Event::inRandomOrder()->firstOrFail(),
            'state_id' => State::where('name', $randomState['name']),
        ];
    }
}
