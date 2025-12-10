<?php

namespace Database\Factories;

use App\Models\Breakpoint;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\GeoService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Segment>
 */
class SegmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $route = Route::inRandomOrder()->first();
        $lastOrder = $route->segments()->max('order') ?? 0;
        $order = $lastOrder + 1;

        $startPoint = Breakpoint::inRandomOrder()->first();
        $endPoint = Breakpoint::where('id', '!=', $startPoint->id)
            ->inRandomOrder()
            ->first();

        $distance = GeoService::distance($startPoint, $endPoint);
        $cost = config('seed.cost_one_km');

        return [
            'name' => $startPoint->name . ' -> ' . $endPoint->name,
            'description' => $this->faker->realText(50),
            'cost' => (int) ($cost * $distance),
            'order' => $order,
            'start_id' => $startPoint->id,
            'end_id' => $endPoint->id,
            'route_id' => $route->id,
        ];
    }

    public function forRoute(Route $route)
    {
        return $this->state(fn() => [
            'route_id' => $route->id,
            'order' => ($route->segments()->max('order') ?? 0) + 1,
        ]);
    }

    public function betweenPoints(Breakpoint $start, Breakpoint $end)
    {
        $distance = GeoService::distance($start, $end);
        $cost = config('seed.cost_one_km');

        return $this->state(fn() => [
            'name'     => $start->name . ' -> ' . $end->name,
            'start_id' => $start->id,
            'end_id'   => $end->id,
            'cost'     => (int) ($cost * $distance),
        ]);
    }

}
