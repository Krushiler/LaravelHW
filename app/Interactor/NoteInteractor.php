<?php

namespace App\Interactor;

use App\Repository\Interface\NoteRepository;
use Illuminate\Support\Facades\Auth;

class NoteInteractor {
    private NoteRepository $noteRepository;

    public function __construct(NoteRepository $noteRepository) {
        $this->noteRepository = $noteRepository;
    }

    public function createNote(String $name, String $note) { 
        return $this->noteRepository->createNote($name, $note); 
    }

    public function getAllNotes() {
        return $this->noteRepository->getAllNotes();
    }
}