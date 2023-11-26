<?php

namespace App\Repository;

use App\Models\Comment;
use App\Repository\Interface\CommentRepository;
use Illuminate\Support\Facades\Auth;

class RealCommentRepository implements CommentRepository {

    public function getComments(int $postId) {
        return Comment::where('post_id', $postId)->get()->toArray();
    }

    public function createComment($data) {
        return Comment::create($data)->toArray();
    }

    public function deleteComment(int $id) {
        return Comment::find($id)->delete();
    }
}