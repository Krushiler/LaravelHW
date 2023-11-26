<?php

namespace App\Providers;

use App\Repository\Interface\AuthRepository;
use App\Repository\RealNoteRepository;
use App\Repository\Interface\NoteRepository;
use App\Repository\RealAuthRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NoteRepository::class, RealNoteRepository::class);
        $this->app->singleton(AuthRepository::class, RealAuthRepository::class);
    }
}
