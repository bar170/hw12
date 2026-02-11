<?php
namespace App\DDD\Infrastructure\Repository;


use App\DDD\Application\Company\DTO\CompanyCreateDTO;
use App\DDD\Application\Company\DTO\CompanyDTO;
use App\DDD\Application\Company\Repository\CompanyRepoInterface;
use App\DDD\Domain\Company\Exception\CompanyNotFoundException;
use App\DDD\Domain\Company\VO\IdVO;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepo implements CompanyRepoInterface
{
    public function getCompanyById(IdVO $id): Company
    {
        return Company::findOrFail($id->value());
    }

    public function updateCompany(CompanyDTO $dto): Company
    {
        $company = Company::find($dto->companyId->value());
        if (!$company) {
            throw new CompanyNotFoundException($dto->companyId);
        }

        $company->name = $dto->name->value();
        $company->description = $dto->description->value();
        $company->save();

        return $company;
    }

    public function destroyCompany(IdVO $id): void
    {
        $company = Company::find($id->value());
        if (!$company) {
            throw new CompanyNotFoundException($id);
        }

        $company->delete();
    }

    public function createCompany(CompanyCreateDTO $dto): Company
    {
        return Company::create([
            'name' => $dto->name->value(),
            'description' => $dto->description->value(),
        ]);
    }

    /**
     * todo ниже "Грязные" запросы. Они как будто бы должны жить не тут. Или организованы должны быть не так?
     */

    public function getRecentCompanies(int $count): Collection
    {
        return Company::orderByDesc("created_at")->take($count)->get();
    }

    /**
     * Получить компании, где число сотрудников больше 2
     */
    public function getBigCompanies(): Collection
    {
        return Company::select('companies.*')
            ->join('members', 'companies.id', '=', 'members.company_id')
            ->groupBy('companies.id')
            ->havingRaw('COUNT(DISTINCT members.user_id) > 1')
            ->get();
    }

    /**
     * Получить все маленькие компании (где только один пользователь и он же является владельцем и водителем)
     */
    public function getSmallCompanies(): Collection
    {
        return Company::select('companies.*')
            ->join('members', 'companies.id', '=', 'members.company_id')
            ->groupBy('companies.id')
            ->havingRaw('COUNT(DISTINCT members.user_id) = 1')
            ->get();
    }

    /**
     * Получить водителей компании
     */
    public function getDrivers(int $companyId): Collection
    {
        $role = config('seed.role_driver');
        $drivers = $this->getMembersByRole($companyId, $role);

        return $drivers;
    }

    /**
     * Получить сотрудников компании по его роли
     */
    public function getMembersByRole(int $companyId, string $role): Collection
    {
        $members = Company::findOrFail($companyId)
            ->members()
            ->whereHas('role', fn($q) => $q->where('name', $role))
            ->get();

        return $members;
    }
}
