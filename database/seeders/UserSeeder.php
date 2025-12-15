<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = config('seed.users_count');
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $count--;

        if ($count > 0) {
            User::factory()->count($count)->create();
        }
    }
}
