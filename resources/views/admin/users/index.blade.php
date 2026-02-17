@extends('admin.layouts.admin')

@section('title', 'Пользователи - Arbusik')

@section('page-header', 'Управление пользователями')

@section('header-actions')
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium inline-flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Добавить пользователя
    </a>
@endsection

@section('content')
    {{-- Фильтры --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-4 mb-6">
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Поиск</label>
                <input type="text" placeholder="Имя или email..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Роль</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option>Все роли</option>
                    <option>Админ</option>
                    <option>Пользователь</option>
                    <option>Водитель</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Статус</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option>Все</option>
                    <option>Активен</option>
                    <option>Заблокирован</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Применить
                </button>
            </div>
        </form>
    </div>

    {{-- Таблица пользователей --}}
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Пользователь</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Роль</th>
                    <th scope="col" class="px-6 py-3">Статус</th>
                    <th scope="col" class="px-6 py-3">Дата регистрации</th>
                    <th scope="col" class="px-6 py-3 text-right">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach(range(1, 5) as $i)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            #{{ $i }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img class="w-8 h-8 rounded-full mr-3" src="https://flowbite.com/docs/images/people/profile-picture-{{ $i }}.jpg" alt="User photo">
                                <span class="font-medium text-gray-900 dark:text-white">Иван Иванов {{ $i }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">user{{ $i }}@example.com</td>
                        <td class="px-6 py-4">
                            @if($i == 1)
                                <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Админ</span>
                            @else
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">Пользователь</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($i != 3)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Активен</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Заблокирован</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ now()->subDays($i)->format('d.m.Y') }}</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-2" title="Редактировать">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button>
                            <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" title="Удалить">
                                <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Пагинация --}}
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Показано <span class="font-medium">1</span> - <span class="font-medium">5</span> из <span class="font-medium">20</span>
                </span>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm disabled:opacity-50 dark:border-gray-600 dark:text-gray-300" disabled>Назад</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded-md text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">2</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">3</button>
                    <button class="px-3 py-1 border border-gray-300 rounded-md text-sm dark:border-gray-600 dark:text-gray-300">Вперед</button>
                </div>
            </div>
        </div>
    </div>
@endsection
