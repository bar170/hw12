<?php
namespace App\DDD\Application\Company\Repository;

use App\DDD\Application\Company\DTO\CompanyCreateDTO;
use App\DDD\Application\Company\DTO\CompanyDTO;
use App\DDD\Domain\Company\VO\IdVO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

interface CompanyRepoInterface
{
    public function getCompanyById(IdVO $id): Company;

    public function getRecentCompanies(int $count): Collection;

    public function createCompany(CompanyCreateDTO $dto): Company;

    public function updateCompany(CompanyDTO $dto): Company;

    public function destroyCompany(IdVO $id): void;
}
