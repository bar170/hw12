<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company = Company::inRandomOrder()->first();
        
        return $this->makeStateForCompany($company);
    }

    public function forCompany(Company $company)
    {
        return $this->state(fn() => $this->makeStateForCompany($company));
    }

    private function makeStateForCompany(Company $company)
    {
        $driver = $company->members()
            ->whereHas('role', fn($q) => $q->where('name', config('seed.role_driver')))
            ->inRandomOrder()
            ->firstOrFail();
        $transport = $company->transports()->inRandomOrder()->firstOrFail();
        $route = $company->routes()->inRandomOrder()->firstOrFail();

        return [
            'start_at'    => $this->faker->dateTimeBetween('now', '+1 month'),
            'driver_id'   => $driver->id,
            'transport_id'=> $transport->id,
            'route_id'    => $route->id,
        ];
    }
}
