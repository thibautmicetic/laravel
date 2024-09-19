<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
        font-weight: normal;
    }
    h1 {
        font-weight: 400;
    }
    input {
        width: 300px;
        height: 34px;
        margin-bottom: 5px;
        font-size: 18px;
        padding: 20px 10px;
        border-radius: 4px;
        border: 1px solid rgba(0, 0, 0, 0.34);
    }
    .submit {
        padding: 10px 10px;
        margin-top: 5px;
        width: 100%;
        background: #9198e5;
        border: 2px solid #6e76cc;
        border-radius: 4px;
        font-weight: 600;
        color: #2d315e;
    }
    .submit:hover {
        cursor: pointer;
    }
    .todo-box {
        display: flex;
        justify-content: space-between;
        text-align: left;
        border: none;
        background: rgba(0, 0, 0, 0.16);
        height: auto;
        margin: 5px 0;
    }
    .todo-box:hover {
        .delete-todo {
            display: block;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            cursor: pointer;
        }
    }
    .delete-todo {
        display: none;
        border: none;
        background: #ff2c2c;
    }
    p {
        margin: 0;
    }
    a {
        color: black;
        padding: 8px 10px;
        font-weight: 500;
        text-decoration: none;
    }
    .todos-count {
        margin-top: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .delete-all {
        margin-top: 0;
        width: 100px;
        background: rgba(255, 0, 0, 0.85);
        border: 2px solid #ff0000;
        color: black;
    }
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@extends('layout.base')

@section('title', 'Todos')

@section('pageTitle')
    <h1>Todo App</h1>
@endsection

@section('content')
    <form action="/todoAdd" method="post">
        @csrf
        <div>
            <input type="text" name="title" placeholder="Titre"/>
        </div>
        <div>
            <input type="text" name="description" placeholder="Description"/>
        </div>
        <button type="submit" class="submit">Envoyer</button>
    </form>
    @foreach($todos as $todo)
            <div class="todo-box">
                <a href="./todo/termine/{{ $todo['id'] }}">
                    {{ $todo['description'] }}
                </a>
                <a class="delete-todo" href="./todo/delete/{{ $todo['id'] }}">
                    <span class="material-symbols-outlined">
                        delete
                    </span>
                </a>
            </div>
    @endforeach
    <div class="todos-count">
        <p>Vous avez {{ $count }} {{ $count > 1 ? 'todos' : 'todo' }}</p>
        <a class="submit delete-all" href="./todo/deleteAll">Supprimer</a>
    </div>
@endsection
