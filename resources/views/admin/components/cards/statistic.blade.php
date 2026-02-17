@props([
    'title' => '',
    'value' => '',
    'change' => '',
    'icon' => '',
    'color' => 'blue'
])

@php
    $colors = [
        'blue' => [
            'bg' => 'bg-blue-100 dark:bg-blue-900',
            'text' => 'text-blue-600 dark:text-blue-300',
            'change' => 'text-green-600 dark:text-green-400'
        ],
        'green' => [
            'bg' => 'bg-green-100 dark:bg-green-900',
            'text' => 'text-green-600 dark:text-green-300',
            'change' => 'text-green-600 dark:text-green-400'
        ],
        'purple' => [
            'bg' => 'bg-purple-100 dark:bg-purple-900',
            'text' => 'text-purple-600 dark:text-purple-300',
            'change' => 'text-green-600 dark:text-green-400'
        ],
        'yellow' => [
            'bg' => 'bg-yellow-100 dark:bg-yellow-900',
            'text' => 'text-yellow-600 dark:text-yellow-300',
            'change' => 'text-green-600 dark:text-green-400'
        ],
    ];
@endphp

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
    <div class="flex items-center justify-between mb-4">
        <div class="p-2 {{ $colors[$color]['bg'] }} rounded-lg">
            <svg class="w-6 h-6 {{ $colors[$color]['text'] }}" fill="currentColor" viewBox="0 0 20 20">
                {!! $icon !!}
            </svg>
        </div>
        @if($change)
            <span class="text-sm {{ $colors[$color]['change'] }} font-medium">{{ $change }}</span>
        @endif
    </div>
    <div>
        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">{{ $title }}</h3>
        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $value }}</p>
    </div>
</div>
