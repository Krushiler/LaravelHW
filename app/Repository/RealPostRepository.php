<?php

namespace App\Repository;

use App\Models\Post;
use App\Repository\Interface\PostRepository;

class RealPostRepository implements PostRepository {
    public function getPosts(?int $userId) {
        if ($userId) {
            return Post::where('user_id', $userId)->get()->toArray();
        } else {
            return Post::all()->toArray();
        }
    }

    public function getPostById(int $id) {
        return Post::find($id)->toArray();
    }

    public function createPost(array $data) {
        return Post::create($data)->toArray();
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