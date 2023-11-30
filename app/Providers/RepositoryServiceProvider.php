<?php

namespace App\Providers;

use App\Repository\Interface\AuthRepository;
use App\Repository\RealNoteRepository;
use App\Repository\Interface\NoteRepository;
use App\Repository\Interface\PostRepository;
use App\Repository\RealPostRepository;
use App\Repository\RealAuthRepository;
use App\Repository\Interface\CommentRepository;
use App\Repository\RealCommentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NoteRepository::class, RealNoteRepository::class);
        $this->app->singleton(AuthRepository::class, RealAuthRepository::class);
        $this->app->singleton(PostRepository::class, RealPostRepository::class);
        $this->app->singleton(CommentRepository::class, RealCommentRepository::class);
    }
}
