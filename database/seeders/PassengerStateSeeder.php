<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Passenger;
use Carbon\Carbon;
use App\Services\StateManager;

class PassengerStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passengers = Passenger::all();
        $time = Carbon::now();

        foreach ($passengers as $passenger) {
            $manager = new StateManager($passenger);
            $rand = rand(1, 6);
            if ($rand > 2) {
                $manager->wait($time);
                $manager->booked($time->copy()->addMinutes(5));
                $manager->checked($time->copy()->addMinutes(10));
                $manager->during($time->copy()->addMinutes(15));
                $manager->success($time->copy()->addMinutes(20));
            } elseif ($rand === 2) {
                $manager->wait($time);
                $manager->booked($time->copy()->addMinutes(5));
                $manager->cancel($time->copy()->addMinutes(10));
            } else {
                $manager->wait($time);
                $manager->booked($time->copy()->addMinutes(5));
                $manager->checked($time->copy()->addMinutes(10));
                $manager->fail($time->copy()->addMinutes(15));
            } 
        }
    }
}
