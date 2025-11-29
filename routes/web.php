<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    $data = \App\Models\User::all();
    //$data = config('seed.companies_count');

    dump($data);

    return '';
});
