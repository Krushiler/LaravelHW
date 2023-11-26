<?php

namespace App\Providers;

use App\Interactor\NoteInteractor;
use App\Interactor\AuthInteractor;
use Illuminate\Support\ServiceProvider;

class InteractorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NoteInteractor::class, NoteInteractor::class);
        $this->app->bind(AuthInteractor::class, AuthInteractor::class);
    }
}
