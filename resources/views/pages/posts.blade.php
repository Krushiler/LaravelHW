@extends('base.layout')

<script type="text/javascript">
  function postClick(postId)
  {
    window.location.href = '/post/' + postId
  }
</script>

@section('title')
    Посты
@endsection

@section('content')
    @if (count($posts) === 0)
        <h2>Постов нет</h2>
    @else
        <ul class="posts-list">
        @foreach ($posts as $post)
            <li onclick="postClick({{ $post->id }})">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </li>
        @endforeach
        </ul>
    @endif
@endsection