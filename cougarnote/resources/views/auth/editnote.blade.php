<x-guest-layout>
    @section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit The Note</h1>

        <form method="POST" action="{{ route('notes.update', $note->id) }}" class="bg-white p-4 rounded shadow mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Title:</label>
                <input type="text" name="title" value="{{ $note->title }}" class="w-full px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Title">
            </div>

            <div class="mb-6">
                <label for="body" class="block text-gray-700 text-sm font-semibold mb-2">Note:</label>
                <textarea name="body" class="w-full px-3 py-2 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Note">{{ $note->body }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Update Note
            </button>
        </form>

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
    </div>
</x-guest-layout>
