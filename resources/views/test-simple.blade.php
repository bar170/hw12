<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Простой тест Tailwind</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-8">
    <div class="bg-white rounded-lg shadow-lg p-6">

        <h1 class="text-3xl font-bold text-blue-600 mb-4">
            Тест Tailwind
        </h1>
        <p class="text-gray-700 mb-4">
            Если этот текст синий и с отступами — Tailwind работает!
        </p>
        <div class="flex space-x-4">
            <div class="bg-blue-500 text-white px-4 py-2 rounded">
                Кнопка 1
            </div>
            <div class="bg-green-500 text-white px-4 py-2 rounded">
                Кнопка 2
            </div>
        </div>

        <button data-dropdown-toggle="dropdown" class="bg-blue-300 rounded px-5 py-3 my-3 text-white hover:bg">
            Меню
        </button>

        <div id="dropdown" class="hidden">
            <ul>
                <li>Текст 1</li>
                <li>423</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
