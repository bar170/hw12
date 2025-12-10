<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Passenger;
use App\Models\State;

class StateManager
{
    private Event | Passenger $entity;

    public function __construct(Event | Passenger $entity)
    {
        $this->entity = $entity;
    }

    public function success(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_success'), $time);
    }
    public function fail(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_fail'), $time);
    }
    public function during(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_during'), $time);
    }
    public function cancel(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_cancel'), $time);
    }
    public function wait(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_wait'), $time);
    }
    public function booked(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_booked'), $time);
    }
    public function checked(?\Carbon\Carbon $time = null): void
    {
        $this->setState(config('seed.state_checked'), $time);
    }

    private function setState($stateName, ?\Carbon\Carbon $time = null): void
    {
        $state = State::where('name', $stateName)->firstOrFail();

        $this->entity->states()->create([
            'state_id'   => $state->id,
            'created_at' => $time ?? now(),
            'updated_at' => $time ?? now(),
        ]);
        
    }
}
?>