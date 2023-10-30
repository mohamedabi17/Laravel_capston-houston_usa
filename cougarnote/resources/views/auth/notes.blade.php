<x-guest-layout>
    @section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">View The Notes</h1>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            {{ __('See And Edit Notes .') }}
        </div>

        @foreach ($notes as $note)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-xl font-semibold mb-2">{{ $note->title }}</h2>
            <p>{{ $note->body }}</p>
            <!-- Add form fields or links to modify the note here -->
            <a href="{{ route('notes.edit', $note->id) }}" class="text-blue-500 hover:underline">Edit</a>
        </div>
        @endforeach
    </div>
</x-guest-layout>
