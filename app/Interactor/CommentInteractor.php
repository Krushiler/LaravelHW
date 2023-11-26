<?php

use App\Repository\Interface\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentInteractor {
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository) {
        $this->commentRepository = $commentRepository;
    }

    public function getComments(int $postId) {
        return $this->commentRepository->getComments($postId);
    }

    public function createComment(int $postId, string $content) {
        return $this->commentRepository->createComment([
            'post_id' => $postId,
            'content' => $content,
            'user_id' => Auth::user()->id
        ]) ?: $this->commentRepository->getComments($postId, $content);
    }

    public function deleteComment(int $id) {
        return $this->commentRepository->deleteComment($id);
    }
}