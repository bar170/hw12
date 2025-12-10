<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получим все компании и добавим им случайное количество событий
        $companies = Company::all();
        foreach ($companies as $company) {
            $eventsCount = rand (1, 5);
            Event::factory()->forCompany($company)->count($eventsCount)->create();
        }
    }
}
