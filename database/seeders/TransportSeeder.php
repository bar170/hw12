<?php

namespace Database\Seeders;

use App\Models\Transport;
use App\Repositories\MemberRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $member = new MemberRepository();
        // Создадим по 1 автомобилю для каждого водителя
        $drivers = $member->getDrivers();
        foreach ($drivers as $driver) {
            Transport::factory()->create();
        }
    }
}
