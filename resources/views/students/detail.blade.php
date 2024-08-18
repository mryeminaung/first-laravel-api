<x-layout>
    <br />
    <a href="{{ session('pre_url') }}"
        class="px-3 py-1 mb-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 me-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Back
    </a>
    <div class="flex w-full px-4 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
        {{ $student->name }} : {{ $student->card->card_number }}
        <br />
        <a href="{{ route('students.edit', ['student' => $student]) }}"
            class="px-3 py-1 mb-2 text-sm font-medium text-black bg-yellow-500 rounded-lg focus:outline-none hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">
            Edit
        </a>
        <form action="{{ route('students.destroy', $student) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="px-3 py-1 mb-2 text-sm font-medium text-black bg-yellow-500 rounded-lg focus:outline-none hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">Delete</button>
        </form>
    </div>
</x-layout>
