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

/**
 * Состояния
 */
$stateSuccess = 'success';
$stateFail = 'fail';
$stateDuring = 'during';
$stateCancel = 'cancel';
$stateWait = 'wait';
$stateBooked = 'booked';
$stateChecked = 'checked';
$states = [
    $stateSuccess => [
        'name' => $stateSuccess,
        'description' => 'Успешное завершение',
        'order' => 200,
    ],
    $stateFail => [
        'name' => $stateFail,
        'description' => 'Не успешное завершение. По своей вине',
        'order' => 500,
    ],
    $stateDuring => [
        'name' => $stateDuring,
        'description' => 'В процессе выполнения',
        'order' => 170,
    ],
    $stateCancel => [
        'name' => $stateCancel,
        'description' => 'Отмена',
        'order' => 90,
    ],
    $stateWait => [
        'name' => $stateWait,
        'description' => 'В состоянии ожидания',
        'order' => 10,
    ],
    $stateBooked => [
        'name' => $stateBooked,
        'description' => 'Забронировано участие в событии',
        'order' => 50,
    ],
    $stateChecked => [
        'name' => $stateChecked,
        'description' => 'Пройдена регистрация на событие (явился на него и ожидание начала события)',
        'order' => 100,
    ],
];

$statesEvent = [
    $states[$stateWait], 
    $states[$stateCancel], 
    $states[$stateDuring], 
    $states[$stateSuccess], 
    $states[$stateFail]
];

$statesPassengers = [
    $states[$stateWait], 
    $states[$stateBooked], 
    $states[$stateCancel], 
    $states[$stateChecked], 
    $states[$stateDuring],
    $states[$stateSuccess],
    $states[$stateFail],
];

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
    'states' => $states,
    'states_event' => $statesEvent,
    'states_passengers' => $statesPassengers,
    'state_success' => $stateSuccess,
    'state_fail' => $stateFail,
    'state_during' => $stateDuring,
    'state_cancel' => $stateCancel,
    'state_wait' => $stateWait,
    'state_booked' => $stateBooked,
    'state_checked' => $stateChecked,
];

?>