<?php

namespace App\Repository;

use App\Models\Post;
use App\Models\ScheduledPost;
use App\Repository\Interface\PostRepository;
use DateTime;

class RealPostRepository implements PostRepository {
    public function getPosts(?int $userId) {
        if ($userId) {
            return Post::where('user_id', $userId)->where('is_published', 1)->orderBy('created_at', 'desc')->get();
        } else {
            return Post::all()->sortByDesc('created_at')->where('is_published', 1);
        }
    }

    public function getPostById(int $id) {
        return Post::where('id', $id)->orderBy('created_at', 'desc')->first();
    }

    public function createPost(array $data, ?DateTime $scheduledAt = null) {
        $post = Post::create($data);
        if ($scheduledAt) {
            ScheduledPost::create([
                'post_id' => $post->id,
                'scheduled_at' => $scheduledAt
            ]);
        } else {
            $post->is_published = 1;
            $post->save();
        }
        return $post;
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