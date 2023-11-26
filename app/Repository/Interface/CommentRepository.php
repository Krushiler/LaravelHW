<?php

namespace App\Repository\Interface;

interface CommentRepository {
    public function getComments(int $postId);

    public function createComment($data);

    public function deleteComment(int $id);
}