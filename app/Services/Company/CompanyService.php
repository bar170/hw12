<?php
namespace App\Services\Company;

use App\DDD\DTO\CompanyDTO;
use App\DDD\VO\Company\DescriptionVO;
use App\DDD\VO\Company\IdVO;
use App\DDD\VO\Company\NameVO;
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

    public function getCompany(IdVO $companyId): Company
    {
        return $this->companyRepo->getCompany($companyId);
    }

    public function updateCompany(CompanyDTO $companyDto): Company | false
    {
        return $this->companyRepo->updateCompany($companyDto);
    }

    public function destroyCompany(IdVO $companyId): bool
    {
        return $this->companyRepo->destroyCompany($companyId);
    }

    public function createCompany(NameVO $name, DescriptionVO $description): Company
    {
        return $this->companyRepo->createCompany($name, $description);
    }


}
