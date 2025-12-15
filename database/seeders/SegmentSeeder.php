<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Segment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получим все маршруты и заполним их отрезками
        $routes = Route::all();
        foreach ($routes as $route) {
            $segmentsCount = rand(1, 5);
            Segment::factory()
                ->forRoute($route)
                ->count($segmentsCount)
                ->create();
        }
    }
}
