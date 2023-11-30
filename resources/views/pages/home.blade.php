@extends('base.layout')

@section('title')
    Главная
@endsection

@section('content')
    <form action="/save-note" method="POST">
        @csrf
        <h2>Заметка</h2>
        <label for="name">Имя заметки:</label>
        <input type="text" name="name">
        <label for="note">Текст заметки:</label>
        <input type="text" name="note">
        <input type="submit">
    </form>
    <div class="divider"></div>
    <form style="margin-top: 16px" action="/create-post" method="POST">
        @csrf
        <h2>Пост</h2>
        <label for="title">Название:</label>
        <input type="text" name="title">
        <label for="content">Контент:</label>
        <input type="text" name="content">
        <input type="submit">
    </form>
@endsection