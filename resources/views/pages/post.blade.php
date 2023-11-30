@extends('base.layout')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <div class="add-comment-section">
        <h3>Добавить комментарий</h3>
        <form method="post" action="/add-comment">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="content" rows="3" placeholder="Введите ваш комментарий" class="comment-input"></textarea>
            <br>
            <button type="submit" class="btn">Добавить комментарий</button>
        </form>
    </div>

    <div class="comments-section">
        <h3>Комментарии</h3>
        @if (count($comments) === 0)
            <p class="no-comments">Нет комментариев</p>
        @else
            @foreach ($comments as $comment)
                <div class="comment">
                    <p>{{ $comment->content }}</p>
                    <p class="comment-author">Автор: {{ $comment->user->name }}</p>
                    @if ($comment->canDelete())
                    <form method="POST" action="/delete-comment" class="delete-form">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-danger">Удалить комментарий</button>
                    </form>
                @endif
                </div>
            @endforeach
        @endif
    </div>
@endsection
