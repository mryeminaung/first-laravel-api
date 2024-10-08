<x-layout>
    <a href="students/create"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Add
    </a>
    <div class="mt-3 space-y-3">
        @foreach ($students as $student)
            <p
                class="w-full px-4 py-2 {{ $loop->odd ? 'bg-slate-300' : '' }} border border-gray-200 rounded-lg dark:border-gray-600">
                {{ $student->name }} : {{ $student->card->card_number }}
                <br />
                <a href="/students/{{ $student->id }}"
                    class="px-3 py-1 mb-2 text-sm font-medium text-black bg-blue-500 rounded-lg focus:outline-none hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                    View
                </a>
            </p>
        @endforeach
    </div>
</x-layout>
