<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        foreach($events as $event) {
            $count = rand (1, 4);
            Review::factory()
                ->count($count)
                ->forEvent($event)
                ->create();
        }
    }
}
