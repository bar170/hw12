<?php
namespace App\DDD\Domain\Company\Service;


class CompanyRules
{
    public const BIG_COMPANY_MIN_EMPLOYEES = 5;
    public static function isBig(int $employeesCount): bool
    {
        return $employeesCount > self::BIG_COMPANY_MIN_EMPLOYEES;
    }
}
