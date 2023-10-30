<x-guest-layout>
    @section('content')
    <div style="margin: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h1 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; color: #ff0000;">View The Notes</h1>

        @if ($errors->any())
        <div style="background-color: #ffcccc; border: 1px solid #ff0000; color: #ff0000; padding: 10px; border-radius: 8px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('success'))
        <div style="background-color: #ccffcc; border: 1px solid #00ff00; color: #00ff00; padding: 10px; border-radius: 8px;">
            {{ session('success') }}
        </div>
        @endif

        <div style="font-size: 0.875rem; color: #333; margin-bottom: 10px;">
            {{ __('See And Edit Notes .') }}
        </div>

        @foreach ($notes as $note)
        <div style="background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 8px; margin-bottom: 10px;">
            <h2 style="font-size: 1.125rem; font-weight: bold; margin-bottom: 10px;">{{ $note->title }}</h2>
            <p>{{ $note->body }}</p>
            <!-- Add form fields or links to modify the note here -->
            <a href="{{ route('notes.edit', $note->id) }}" style="color: #007bff; text-decoration: underline; margin-left: 10px;">Edit</a>
        </div>
        @endforeach
    </div>
</x-guest-layout>
