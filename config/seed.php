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
    $roleOwner => ['id' => 1, 'name' => $roleOwner, 'description' => 'Владелец', 'rights' => 10],
    $roleDriver => ['id' => 2, 'name' => $roleDriver, 'description' => 'Водитель', 'rights' => 5],
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

/**
 * Типы отзывов
 */
$entityEvent = 'event';
$entityDriver = 'driver';
$entityPassenger = 'passenger';
$reviewTypes = [
    $entityEvent => [
        'name' => 'событие',
        'description' => 'Отзыв на поездку',
        'entity' => $entityEvent,
        'model' => 'App\models\Event'
    ],
    $entityDriver => [
        'name' => 'водитель',
        'description' => 'Отзыв на водителя',
        'entity' => $entityDriver,
        'model' => 'App\models\Driver'
    ],
    $entityPassenger => [
        'name' => 'пассажир',
        'description' => 'Отзыв на пассажира',
        'entity' => $entityPassenger,
        'model' => 'App\models\Passenger'
    ],
];

/**
 * Маршруты
 */
// Количество существующих остановок в маршрутах 
$breakpointsCount = 33;
// Стоимость одного км в рублях
$costOneKm = 1;

return [
    'users_count' => $usersCount,
    'roles_count' => $rolesCount,
    'role_driver' => $roleDriver,
    'role_owner' => $roleOwner,
    'roles_must_be' => $rolesMustBe,
    'companies_count' => $companiesCount,
    'companies_small_count' => $companiesSmallCount,
    'companies_medium_count' => $companoesMediumCount,
    'entity_event' => $entityEvent,
    'entity_driver' => $entityDriver,
    'entity_passenger' => $entityPassenger,
    'review_types' => $reviewTypes,
    'breakpoints_count' => $breakpointsCount,
    'cost_one_km' => $costOneKm,
];

?>