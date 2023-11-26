<?php

namespace App\Http\Controllers;

use App\Exceptions\UnauthorizedException;
use Illuminate\Http\Request;
use App\Interactor\NoteInteractor;

class NoteController extends Controller
{
    private $noteInteractor;

    public function __construct(NoteInteractor $noteInteractor)
    {
        $this->noteInteractor = $noteInteractor;    
    }

    public function saveNote(Request $request) {
        $request->validate([
            'name' => 'required',
            'note' => 'required'
        ]);

        $name = $request->input('name');
        $note = $request->input('note');

        $this->noteInteractor->createNote($name, $note);

        return view('pages.note', ['name' => $name, 'note' => $note]);
    }

    public function getNotes() {
        $notes = $this->noteInteractor->getAllNotes();
        return view('pages.notes', ['notes' => $notes]);
    }
}
