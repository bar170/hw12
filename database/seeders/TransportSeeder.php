<?php

namespace Database\Seeders;

use App\DDD\Infrastructure\Repository\CompanyRepo;
use App\Models\Transport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyRepo = new CompanyRepo();
        // Создадим по 1 автомобилю для каждой маленькой компании
        $companiesSmall = $companyRepo->getSmallCompanies();
        foreach ($companiesSmall as $company) {
            Transport::factory()->create(['company_id' => $company->id]);
        }
        // Создадим по несколько автомобилей для крупных компаний
        $companiesBig = $companyRepo->getBigCompanies();
        foreach ($companiesBig as $company) {
            $transportCount = rand(2, 5);
            Transport::factory()->count($transportCount)->create(['company_id' => $company->id]);
        }
    }
}
