<x-layout>
    <x-slot name="content">
        @foreach ($students as $student)
            <p class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                {{ $student->name }} : {{ $student->card->card_number }}
                <br />
                <a href="/students/{{ $student->id }}/delete"
                    class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    Delete
                </a>
            </p>
        @endforeach
    </x-slot>
</x-layout>
