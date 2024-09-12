@extends('layout.base')

@section('title', 'Ping')

@section('content')
    <h1>{{ $word  }}</h1>
    <ul>
        @foreach($serverInfo as $key => $value)
            <li>{{ $key }} : {{ $value }}</li>
        @endforeach
    </ul>
    @if($word === 'PING')
        <p>La page est en mode PING => {{ date('d/m/Y') }}</p>
    @else
        <p>La page est en mode PONG {{date('d/m/Y')}}</p>
    @endif
@endsection
