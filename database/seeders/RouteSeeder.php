<?php

namespace Database\Seeders;

use App\Repositories\CompanyRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyRepo = new CompanyRepository();
        // У маленьких компаний будет по одному маршруту
        foreach ($companyRepo->getSmallCompanies() as $company) {
            Route::factory()->create([
                'company_id' => $company->id,
            ]);
        }
        // У больших компаний бодет более одного маршрута
        foreach ($companyRepo->getBigCompanies() as $company) {
            $countRoutes = rand (1, 5);
            while ($countRoutes > 1) {
                Route::factory()->create([
                    'company_id' => $company->id,
                ]);
                $countRoutes--;
            }
        }
    }
}
