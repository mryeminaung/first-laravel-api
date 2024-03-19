<x-layout>
    <x-slot name="content">
        {{ $students->links() }}
        <a href="students/create"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Add
        </a>
        <div class="space-y-3 mt-3">
            @foreach ($students as $student)
                <p
                    class="w-full px-4 py-2 {{ $loop->odd ? 'bg-slate-300' : '' }} border border-gray-200 rounded-lg dark:border-gray-600">
                    {{ $student->name }} : {{ $student->card->card_number }}
                    {{-- {{ $student->type->desc }} --}}
                    <br />
                    <a href="/students/{{ $student->id }}"
                        class="focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                        View
                    </a>
                </p>
            @endforeach
        </div>
    </x-slot>
</x-layout>
