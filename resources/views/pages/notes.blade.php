@extends('base.layout')

@section('title')
    Заметки
@endsection

@section('content')
    <h1>Заметки</h1>
    @if (count($notes) === 0)
        <p>Заметок нет</p>
    @else
        <ul class="notes-list">
        @foreach ($notes as $note)
            <li>
                <h2>{{ $note->name }}</h2>
                <p>{{ $note->note }}</p>
            </li>
        @endforeach
        </ul>
    @endif
@endsection