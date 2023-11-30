<?php

namespace App\Repository;

use App\Models\Note;
use App\Repository\Interface\NoteRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RealNoteRepository implements NoteRepository {
    public function createNote(String $name, String $note) {
        if (!Auth::check()) {
            throw new \App\Exceptions\UnauthorizedException();
        }
        $user = Auth::user();

        $note = Note::create([
            'user_id' => $user->id,
            'name' => $name,
            'note' => $note
        ]);
    }

    public function getAllNotes() {
        if (!Auth::check()) {
            throw new \App\Exceptions\UnauthorizedException();
        }
        $user = Auth::user();

        $notes = $user->notes()->get();
        return $notes;
    }
}