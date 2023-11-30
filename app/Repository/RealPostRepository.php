<?php

namespace App\Repository;

use App\Models\Post;
use App\Repository\Interface\PostRepository;

class RealPostRepository implements PostRepository {
    public function getPosts(?int $userId) {
        if ($userId) {
            return Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        } else {
            return Post::all()->sortByDesc('created_at');
        }
    }

    public function getPostById(int $id) {
        return Post::where('id', $id)->orderBy('created_at', 'desc')->first();
    }

    public function createPost(array $data) {
        return Post::create($data);
    }

    public function updatePost(int $id, array $data) {
        return Post::where('id', $id)->update($data);
    }

    public function deletePost(int $id) {
        return Post::find($id)->delete();
    }

    public function restorePost(int $id) {
        return Post::withTrashed()->find($id)->restore();
    }
}