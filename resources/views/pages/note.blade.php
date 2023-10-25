@extends('base.layout')

@section('title')
    {{ $name }}
@endsection

@section('content')
    <h2>{{ $name }}</h2>
    <p>{{ $note }}</p>
@endsection