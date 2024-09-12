@extends('layout.base')

@section('title', 'Login')

@section('content')
    <h1>Se connecter</h1>

    <form action="/traitementLogin" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <button type="submit">Envoyer</button>
    </form>

    <br>

    <a style="color: black; font-weight: bold; text-decoration: none; margin-top: 10px" href="./register">Pas de compte ? S'inscire</a>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
