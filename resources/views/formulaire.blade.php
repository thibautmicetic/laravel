@extends('layout.base')

@section('title', 'Demandes')

@section('content')
    <h1>Demandes</h1>
    <form action="/createDemande" method="post">
        @csrf
        <input type="text" name="titre" />
        <input type="text" name="texte" />
        <input type="email" name="email" />
        <button type="submit">Envoyer</button>
    </form>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
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
