<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companySmall = config('seed.companies_small_count');
        $companyMedium = config('seed.companies_medium_count');

        $companies = Company::all();
        // Все возможные роли, кроме владельца
        $memberRoles = Role::where('name', '!=', 'owner');
        // Роли, которые обязательно доолжны быть в каждой комнании
        $rolesMustBu = MemberSeeder::getMustBuModels();
        $ownerRole = $rolesMustBu['owner'];
        $driverRole = $rolesMustBu['driver'];

        $i = 0;
        foreach ($companies as $company) {
            $user = User::inRandomOrder()->first();
                Member::create([
                    'user_id' => $user->id,
                    'role_id' => $ownerRole->id,
                    'company_id' => $company->id,
                ]);

            if ($i < $companySmall) {
                Member::create([
                    'user_id' => $user->id,
                    'role_id' => $driverRole->id,
                    'company_id' => $company->id,
                ]);
            } else {
                // Значит компания большая и владелец не является вожителем
                Member::factory()->driver($company->id)->create();
                // Опредедим случайное количество сотрудников в компании (кроме уже определенных владельца и водителя)
                $employeesCount = rand(1, 5);
                for ($k = 0; $k < $employeesCount; $k++) {
                    Member::factory()->employee($company->id)->create();
                }
            }
            $i++;
        }
    }

    public static function getMustBuModels(): array
    {
        $roles = config('seed.roles_must_be');
        $res = [];

        foreach($roles as $role) {
            $name = $role['name'];
            $res[$name] = Role::where('name', $name)->first();
        }
        
        return $res;

    }
}
