<x-layout>
    <x-slot name="content">
        <a href="{{ session('pre_url') }}"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Back
        </a>
        <p class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            {{ $student->name }} : {{ $student->card->card_number }}
            <br />
            <a href="/students/{{ $student->id }}/edit"
                class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">
                Edit
            </a>
            <a href="/students/{{ $student->id }}/delete"
                class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Delete
            </a>
        </p>

    </x-slot>
</x-layout>
