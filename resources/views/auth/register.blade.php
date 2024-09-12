@extends('layout.base')

@section('title', 'Register')

@section('content')
    <h1>S'inscrire</h1>

    <form action="/traitementRegister" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nom"/>
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <button type="submit">Envoyer</button>
    </form>

    <br>

    <a style="color: black; font-weight: bold; text-decoration: none; margin-top: 10px" href="./login">Déja un compte ? Se connecter</a>

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
