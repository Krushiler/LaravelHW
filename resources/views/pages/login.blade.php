@extends('base.layout')

@section('title')
    Вход
@endsection

@section('content')
    <form action="/authenticate" method="POST">
        @csrf
        <label for="name">Логин:</label>
        <input type="text" name="name">
        <label for="password">Пароль:</label>
        <input type="text" name="password">
        <input type="submit" name="login" value="Войти">
        <input type="submit" name="register" value="Зарегестрироваться">
    </form>

    @if (isset($error))
        <p class="error">{{ $error }}</p>
    @endif
@endsection