<?php

namespace App\Providers;

use App\Repository\RealNoteRepository;
use App\Repository\Interface\NoteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NoteRepository::class, RealNoteRepository::class);
    }
}
