@extends('layout.main')

@section('title', 'Добро пожаловать')

@section('content')
    <div class="text-center py-12">

        <h1 class="text-3xl font-bold mb-4">Добро пожаловать на Arbusik.ru</h1>

        <p class="text-gray-600 mb-6">
            Найдите попутчиков, создавайте поездки, управляйте перевозками.
        </p>

        <div class="space-x-4">
            <a href="{{ route('login') }}"
               class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Войти
            </a>

            <a href="{{ route('register') }}"
               class="px-6 py-3 bg-gray-200 rounded-lg hover:bg-gray-300">
                Регистрация
            </a>
        </div>

    </div>
@endsection
