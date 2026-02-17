@props([
    'headers' => [],
    'rows' => [],
    'actions' => true
])

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach($headers as $header)
                <th scope="col" class="px-6 py-3">{{ $header }}</th>
            @endforeach
            @if($actions)
                <th scope="col" class="px-6 py-3 text-right">Действия</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach($row as $index => $cell)
                    @if($index < count($headers))
                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {!! $cell !!}
                        </td>
                    @endif
                @endforeach

                @if($actions)
                    <td class="px-6 py-4 text-right">
                        <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-2">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </button>
                        <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
