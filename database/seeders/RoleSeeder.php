<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = config('seed.roles_count');
        $rolesMusBe = config('seed.roles_must_be');

        $i = 0;
        foreach($rolesMusBe as $role) {
            Role::create($role);
            $i++;
        }
        for (; $i < $count; $i++) {
            Role::factory()->create();
        }
    }
}
