<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(TransportSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(BreakpointSeeder::class);
        $this->call(SegmentSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(PassengerSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(EventStateSeeder::class);
    }
}
