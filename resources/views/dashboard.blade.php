@extends('layout.main')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Добро пожаловать, {{ auth()->user()->name }}</h1>

    <p class="text-gray-600">
        Здесь будет ваша персональная панель управления.
    </p>
@endsection
