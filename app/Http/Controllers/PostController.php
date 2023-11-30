<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interactor\PostInteractor;
use App\Interactor\CommentInteractor;

class PostController {
    private $postInteractor;
    private $commentInteracor;

    public function __construct(PostInteractor $postInteractor, CommentInteractor $commentInteracor) {
        $this->postInteractor = $postInteractor;
        $this->commentInteracor = $commentInteracor;
    }

    public function createPost(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $title = $request->input('title');
        $content = $request->input('content');

        $post = $this->postInteractor->createPost($title, $content);

        return redirect()->route('get-post', ['id' => $post->id]);
    }

    public function getPosts() {
        $posts = $this->postInteractor->getAllPosts();
        return view('pages.posts', ['posts' => $posts]);
    }

    public function addComment(Request $request) {
        $request->validate([
            'post_id' => 'required',
            'content' => 'required'
        ]);

        $postId = $request->input('post_id');
        $content = $request->input('content');

        $this->commentInteracor->createComment($postId, $content);

        return redirect()->route('get-post', ['id' => $postId]);
    }

    public function getPost($id) {
        $post = $this->postInteractor->getPostById($id);

        $comments = $this->commentInteracor->getComments($id);

        return view('pages.post', ['post' => $post, 'comments' => $comments]);
    }

    public function deleteComment(Request $request) {
        $request->validate([
            'comment_id' => 'required',
            'post_id' => 'required'
        ]);

        $commentId = $request->input('comment_id');
        $postId = $request->input('post_id');

        $this->commentInteracor->deleteComment($commentId);

        return redirect()->route('get-post', ['id' => $postId]);
    }
}