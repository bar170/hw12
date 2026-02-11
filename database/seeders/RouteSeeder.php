<?php

namespace Database\Seeders;


use App\DDD\Domain\Company\Service\CompanyRules;
use App\DDD\Infrastructure\Repository\CompanyRepo;
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
        $companyRepo = new CompanyRepo();
        $count = CompanyRules::BIG_COMPANY_MIN_EMPLOYEES;
        $companiesSmall = $companyRepo->getCompaniesLessMember($count - 1);
        // У маленьких компаний будет по одному маршруту
        foreach ($companiesSmall as $company) {
            Route::factory()->create([
                'company_id' => $company->id,
            ]);
        }
        // У больших компаний будет более одного маршрута
        $companiesBig = $companyRepo->getCompaniesMoreMember($count);
        foreach ($companiesBig as $company) {
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
