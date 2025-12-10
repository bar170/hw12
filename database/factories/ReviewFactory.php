<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\Event;
use App\Models\Member;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    private ?Event $event = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $event = Event::inRandomOrder()->firstOrFail();
        $passengers = $event->passengers();
        $driver = $event->driver;
        $isDriverReview = (rand (1, 3) === 1);
        if ($isDriverReview) {
            // Значит отзыв оставляет водитель на пассажира
            $targetName = config('seed.entity_passenger');
            $user = $driver->user;
        } else {
            // Отзыв оставляет пассажир на водителя или поездку в целом
            $targetName = (rand (1, 3) === 1) ? config('seed.entity_event') : config('seed.entity_driver');
            $user = $passengers->inRandomOrder()->firstOrFail();
        }
        $type = Type::where('entity', $targetName)->first();

        $target = match($targetName) {
            config('seed.entity_passenger') => $passengers->inRandomOrder()->firstOrFail(),
            config('seed.entity_event') => $event,
            config('seed.entity_driver') => $driver,
        };

        return [
            'rate' => rand (1, 5),
            'comment' => $this->faker->realText(50),
            'type_id' => $type->id,
            'event_id' => $event->id,
            'user_id' => $user->id,
            'target_id' => $target->id
        ];
    }

    public function forEvent(Event $event)
    {
        return $this->state(fn() => $this->makeStateForEvent($event));
    }

    public function targetDriver()
    {
        if (!$this->event) {
            throw new \LogicException('Нужно указать событие forEvent($event)');
        }

        return $this->state(function() {
            $driver = $this->event->driver;
            $passenger = $this->event->passengers()->inRandomOrder()->firstOrFail();

            return [
                'target_id' => $driver->id,
                'type_id' => Type::where('entity', config('seed.entity_driver'))->first()->id,
                'user_id' => $passenger->user->id,
            ];
        });
    }

    public function targetPassenger(?Member $passenger = null)
    {
        if (!$this->event) {
            throw new \LogicException('Нужно указать событие forEvent($event)');
        }
        return $this->state(function() use ($passenger) {
            $driver = $this->event->driver;
            $passenger = $passenger ?? $this->event->passengers()->inRandomOrder()->firstOrFail();

            return [
                'target_id' => $passenger->id,
                'type_id' => Type::where('entity', config('seed.entity_passenger'))->first()->id,
                'user_id' => $driver->user->id,
            ];
        });
    }

    public function targetEvent()
    {
        if (!$this->event) {
            throw new \LogicException('Нужно указать событие forEvent($event)');
        }

        return $this->state(function() {
            $passenger = $this->event->passengers()->inRandomOrder()->firstOrFail();

            return [
                'target_id' => $this->event->id,
                'type_id' => Type::where('entity', config('seed.entity_event'))->first()->id,
                'user_id' => $passenger->user()->id,
            ];
        });
    }


    private function makeStateForEvent(Event $event)
    {
        $this->event = $event;

        $passengers = $event->passengers();
        $driver = $event->driver;
        $isDriverReview = (rand (1, 3) === 1);
        if ($isDriverReview) {
            // Значит отзыв оставляет водитель на пассажира
            $targetName = config('seed.entity_passenger');
            $user = $driver->user;
        } else {
            // Отзыв оставляет пассажир на водителя или поездку в целом
            $targetName = (rand (1, 3) === 1) ? config('seed.entity_event') : config('seed.entity_driver');
            $user = $passengers->inRandomOrder()->firstOrFail();
        }
        $type = Type::where('entity', $targetName)->first();

        $target = match($targetName) {
            config('seed.entity_passenger') => $passengers->inRandomOrder()->firstOrFail(),
            config('seed.entity_event') => $event,
            config('seed.entity_driver') => $driver,
        };

        return [
            'rate' => rand (1, 5),
            'comment' => $this->faker->realText(50),
            'type_id' => $type->id,
            'event_id' => $event->id,
            'user_id' => $user->id,
            'target_id' => $target->id
        ];
    }
}
