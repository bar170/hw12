<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Services\StateManager;
use Carbon\Carbon;

class EventStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        $time = Carbon::now();

        foreach ($events as $event) {
            $manager = new StateManager($event);
            $rand = rand(1, 6);
            if ($rand > 2) {
                $manager->wait($time);
                $manager->during($time->copy()->addMinutes(5));
                $manager->success($time->copy()->addMinutes(10));
            } elseif ($rand === 2) {
                $manager->wait($time);
                $manager->cancel($time->copy()->addMinutes(5));
            } else {
                $manager->wait($time);
                $manager->during($time->copy()->addMinutes(5));
                $manager->fail($time->copy()->addMinutes(10));
            } 
        }
    }
}
