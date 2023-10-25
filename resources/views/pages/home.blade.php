@extends('base.layout')

@section('title')
    Главная
@endsection

@section('content')
    <h2>Добро пожаловать на главную страницу!</h2>
    <p>Это контент главной страницы.</p>
    <form action="/save-note" method="POST">
        @csrf
        <label for="name">Имя заметки:</label>
        <input type="text" name="name">
        <label for="note">Текст заметки:</label>
        <input type="text" name="note">
        <input type="submit">
    </form>
@endsection