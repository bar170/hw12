<?php
namespace App\Repositories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Collection;

class MemberRepository
{
    public function getMembersByRole(string $role): Collection
    {
        $members = Member::whereHas('role', fn($q) => $q->where('name', $role))
            ->get();

        return $members;
    }

    public function getDrivers(): Collection
    {
        $role = config('seed.role_driver');
        $drivers = $this->getMembersByRole($role);

        return $drivers;
    }

    public function getOwners(): Collection
    {
        $role = config('seed.role_owner');
        $owners = $this->getMembersByRole($role);

        return $owners;
    }
}