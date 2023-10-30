<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use DB;


class NoteController extends Controller

{
    public function create()
    {
       return view('auth.create');
         // Assuming 'notes.create' is the correct view path
    }
    public function index()
    {
        $notes = Note::all(); // Fetch all notes from the database
        return view('auth.notes', compact('notes'));
    }
        public function edit(Note $note)
    {
        return view('auth.editnote', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $note->update($validatedData);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully');
    }


    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    // Get the currently authenticated user
    $user = auth()->user();

    // Create a new note with the validated data and associate it with the user
    $note = new Note([
        'title' => $validatedData['title'],
        'body' => $validatedData['body'],
    ]);

    //   dd($user);
    // Save the note to the database
      $user->notes()->save($note);

 

    // Return a JSON response indicating success
    return response()->json(['success' => true, 'message' => 'Note created successfully']);
}
}
