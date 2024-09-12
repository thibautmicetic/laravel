@extends('layout.base')

@section('title', 'Ping')

@section('content')
    <h1>Todo</h1>

    @foreach($todos as $todo)
        <p><a style="color: black; font-weight: bold; text-decoration: none; margin-top: 10px"
              href="./todo/termine/{{ $todo['id'] }}"> - Titre: {{ $todo['title'] }} - Description: {{ $todo['description'] }}</a></p>
        <p><a style="color: red; font-weight: bold; text-decoration: none; margin-top: 10px"
              href="./todo/delete/{{ $todo['id'] }}">Supprimer</a></p>
        <br>
    @endforeach

    <form action="/todoAdd" method="post">
        @csrf
        <input type="text" name="title" />
        <input type="text" name="description" />
        <button type="submit">Envoyer</button>
    </form>
@endsection
