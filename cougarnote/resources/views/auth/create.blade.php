<x-guest-layout>
    
    @section('content')
    <div class="container">
        <h1>Create a New Note</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Please add Your note .') }}
    </div>

    <form method="POST" action="{{ route('note.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" id="note-form">
            @csrf <!-- Include the CSRF token for security -->

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Module Name:</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Module Name">
        </div>

        <div class="mb-6">
            <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Note:</label>
            <textarea name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Note"></textarea>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Create Note
            </button>
        </div>
    </form>

        <div class="flex justify-end mt-4">
        <x-primary-button id="confirmButton" data-url="{{ route('note.store') }}">
            {{ __('Confirm') }}
        </x-primary-button>
    </div>
    </form>
</x-guest-layout>

<script>
    document.getElementById('confirmButton').addEventListener('click', function () {
        const formData = new FormData(document.getElementById('note-form'));
        console.log(formData)
        const url = this.getAttribute('data-url');

        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Note stored successfully');
            } else {
                alert('Note storage failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>
