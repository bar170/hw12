<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'role_id' => Role::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
        ];
    }

    public function owner(int $companyId): Factory
    {
        return $this->state(function () use ($companyId){ 
            return [
                'user_id' => User::inRandomOrder()->first()->id,
                'role_id' => Role::where('name','owner')->first()->id,
                'company_id' => $companyId,
            ];
        });
    }

    public function driver(int $companyId): Factory
    {
        return $this->state(function () use ($companyId){ 
            return [
                'user_id' => User::inRandomOrder()->first()->id,
                'role_id' => Role::where('name','driver')->first()->id,
                'company_id' => $companyId,
            ];
        });
    }

    public function employee(int $companyId): Factory
    {
        return $this->state(function () use ($companyId){ 
            return [
                'user_id' => User::inRandomOrder()->first()->id,
                'role_id' => Role::where('name','!=','owner')->inRandomOrder()->first()->id,
                'company_id' => $companyId,
            ];
        });
    }
}
