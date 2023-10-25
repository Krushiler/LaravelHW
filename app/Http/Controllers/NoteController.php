<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\NoteRepository;

class NoteController extends Controller
{
    private $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;    
    }

    public function saveNote(Request $request) {
        $request->validate([
            'name' => 'required',
            'note' => 'required'
        ]);
        $name = $request->input('name');
        $note = $request->input('note');

        $this->noteRepository->createNote($name, $note);

        return view('pages.note', ['name' => $name, 'note' => $note]);
    }

    public function getNotes() {
        $notes = $this->noteRepository->getAllNotes();
        return view('pages.notes', ['notes' => $notes]);
    }
}
