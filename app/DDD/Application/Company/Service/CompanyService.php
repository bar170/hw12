<?php
namespace App\DDD\Application\Company\Service;


use App\DDD\Application\Company\DTO\CompanyCreateDTO;
use App\DDD\Application\Company\DTO\CompanyDTO;
use App\DDD\Application\Company\Repository\CompanyRepoInterface;
use App\DDD\Domain\Company\VO\IdVO;
use App\Models\Company;


class CompanyService implements CompanyServiceInterface
{
    public function __construct(private CompanyRepoInterface $companyRepo)
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

    public function updateCompany(CompanyDTO $dto): Company
    {
        return $this->companyRepo->updateCompany($dto);
    }

    public function destroyCompany(IdVO $companyId): bool
    {
        return $this->companyRepo->destroyCompany($companyId);
    }

    public function createCompany(CompanyCreateDTO $dto): Company
    {
        return $this->companyRepo->createCompany($dto);
    }


}
