<?php

namespace App\Interactor;

use App\Repository\Interface\PostRepository;
use DateTime;
use Illuminate\Support\Facades\Auth;

class PostInteractor {
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts() {
        return $this->postRepository->getPosts(null);
    }

    public function getMyPosts() {
        return $this->postRepository->getPosts(Auth::user()->id);
    }

    public function getPostById(int $id) {
        return $this->postRepository->getPostById($id);
    }

    public function createPost(string $title, string $content, ?DateTime $scheduledAt = null) {
        return $this->postRepository->createPost([
            'title' => $title,
            'content' => $content,
            'user_id' => Auth::user()->id
        ], $scheduledAt);
    }
}