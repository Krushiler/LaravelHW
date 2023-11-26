<?php

namespace App\Repository\Interface;

interface NoteRepository {
    public function createNote(String $name, String $note);

    public function getAllNotes(): array;
}