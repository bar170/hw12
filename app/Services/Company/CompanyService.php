<?php
namespace App\Services\Company;

use App\Models\Company;
use \App\Repositories\CompanyRepository;

class CompanyService
{
    public function __construct(private CompanyRepository $companyRepo)
    {

    }


    public function getRecentCompanies(int $count = 5): \Illuminate\Database\Eloquent\Collection
    {
        return $this->companyRepo->getRecentCompanies($count);
    }

    public function getCompany(int $companyId): Company
    {
        return $this->companyRepo->getCompany($companyId);
    }
}