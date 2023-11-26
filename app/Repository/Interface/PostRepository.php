<?php

namespace App\Repository\Interface;

interface PostRepository {
    public function getPosts(?int $userId);
    
    public function getPostById(int $id);

    public function createPost(array $data);

    public function updatePost(int $id, array $data);

    public function deletePost(int $id);

    public function restorePost(int $id);
}