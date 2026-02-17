@extends('admin.layouts.admin')

@section('title', 'Дашборд - Arbusik')

@section('page-header', 'Дашборд')

@section('header-actions')
    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium">
        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
        </svg>
        Экспорт
    </button>
@endsection

@section('content')
    {{-- Только статистика, ничего лишнего --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @include('admin.components.cards.statistic', [
            'title' => 'Пользователи',
            'value' => '1,234',
            'change' => '+12%',
            'icon' => '<path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>',
            'color' => 'blue'
        ])

        @include('admin.components.cards.statistic', [
            'title' => 'Компании',
            'value' => '89',
            'change' => '+5%',
            'icon' => '<path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>',
            'color' => 'green'
        ])

        @include('admin.components.cards.statistic', [
            'title' => 'Поездки',
            'value' => '456',
            'change' => '+23%',
            'icon' => '<path d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
            'color' => 'purple'
        ])

        @include('admin.components.cards.statistic', [
            'title' => 'Доход',
            'value' => '45,678 ₽',
            'change' => '+8%',
            'icon' => '<path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
            'color' => 'yellow'
        ])
    </div>

    {{-- Чистое поле — тут будет контент по мере необходимости --}}
    <div class="mt-6">
        {{-- Место для будущих виджетов, графиков или таблиц --}}
    </div>
@endsection
