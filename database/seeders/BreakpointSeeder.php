<?php

namespace Database\Seeders;

use App\Models\Breakpoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreakpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = config('seed.breakpoints_count');
        Breakpoint::factory()->count($count)->create();
    }
}
