<?php
namespace App\DDD\Application\Company\Service;

use App\DDD\Application\Company\DTO\CompanyCreateDTO;
use App\DDD\Application\Company\DTO\CompanyDTO;
use App\DDD\Domain\Company\VO\IdVO;
use App\Models\Company;

interface CompanyServiceInterface
{
    public function getRecentCompanies(int $count = 5): \Illuminate\Database\Eloquent\Collection;

    public function getCompany(IdVO $companyId): Company;
    public function updateCompany(CompanyDTO $dto): Company;
    public function destroyCompany(IdVO $companyId): bool;
    public function createCompany(CompanyCreateDTO $dto): Company;
}
