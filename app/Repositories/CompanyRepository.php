<?php
namespace App\Repositories;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{
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

    public function getRecentCompanies(int $count): \Illuminate\Database\Eloquent\Collection
    {
        return Company::orderByDesc("created_at")->take($count)->get();
    }

    public function getCompany(int $companyId): Company
    {
        return Company::findOrFail($companyId);
    }
}
?>