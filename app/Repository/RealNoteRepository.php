<?php

namespace App\Repository;

use App\Repository\Interface\NoteRepository;
use Illuminate\Support\Facades\Storage;

class RealNoteRepository implements NoteRepository {
    public function createNote(String $name, String $note) {
        $data = [
            'name' => $name,
            'note' => $note
        ];

        if (Storage::exists('json')) {
            Storage::makeDirectory('json');
        }

        $jsonData = json_encode($data);

        $jsonName = uniqid('json_', true);

        file_put_contents('json/' . $jsonName . '.json', $jsonData);
    }

    public function getAllNotes() {
        $files = scandir('json');
        $notes = [];
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $jsonData = file_get_contents('json/' . $file);
                $note = json_decode($jsonData, true);
                
                if ($note !== null) {
                    $notes[] = $note;
                }
            }
        }
        return $notes;
    }
}