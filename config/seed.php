<?php

// Количество юзеров
$usersCount = 200;

/**
 * РОЛИ
 */
// Количество ролей
$rolesCount = 5;
// Обязательные роли (эти роли должны быть у компании, чтобы совершать перевозки)
$roleOwner = 'owner';
$roleDriver = 'driver';
$rolesMustBe = [
    ['name' => $roleOwner, 'description' => 'Владелец', 'rights' => 10],
    ['name' => $roleDriver, 'description' => 'Водитель', 'rights' => 5],
];

/**
 * Правила по составу компании (количество members)
 */
// Количество компаний
$companiesCount = ceil($usersCount / 20);
// В компании в среднем от 1 до 5 сотрудников, причем там где всего 1 сотрудник - большинство компаний
// Доля компаний, где всего один сотрудник
$componiesShareSmall = 0.7;
// Доля компаний, где более одного сотрудника
$componiesShareMedium = 0.2;

$companiesSmallCount = ceil($companiesCount * $componiesShareSmall);
$companoesMediumCount = ceil($companiesCount * $componiesShareMedium);
$companiesCount = $companiesSmallCount + $companoesMediumCount;



return [
    'users_count' => $usersCount,
    'roles_count' => $rolesCount,
    'roles_must_be' => $rolesMustBe,
    'companies_count' => $companiesCount,
    'companies_small_count' => $companiesSmallCount,
    'companies_medium_count' => $companoesMediumCount,
];

?>