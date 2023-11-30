<?php

namespace App\Providers;

use App\Interactor\NoteInteractor;
use App\Interactor\AuthInteractor;
use App\Interactor\CommentInteractor;
use App\Interactor\PostInteractor;
use Illuminate\Support\ServiceProvider;

class InteractorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NoteInteractor::class, NoteInteractor::class);
        $this->app->bind(AuthInteractor::class, AuthInteractor::class);
        $this->app->bind(CommentInteractor::class, CommentInteractor::class);
        $this->app->bind(PostInteractor::class, PostInteractor::class);
    }
}
