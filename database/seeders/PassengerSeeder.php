<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Passenger;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        foreach ($events as $event) {
            $count = rand (1, 5);
            Passenger::factory()->count($count)->create(['event_id' => $event->id]);
        }
    }
}
