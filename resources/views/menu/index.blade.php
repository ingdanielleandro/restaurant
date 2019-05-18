@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="display-5">{{ $title }}</h1>
        @if($proteinas->isNotEmpty())
        @foreach ($proteinas as $proteina)
            {{$proteina->name}} <br>
        @endforeach
        @endif

        <hr>

        @if($principios->isNotEmpty())
        @foreach ($principios as $principio)
            {{$principio->name}} <br>
        @endforeach
        @endif

        <hr>

        @if($sopas->isNotEmpty())
        @foreach ($sopas as $sopa)
            {{$sopa->name}} <br>
        @endforeach
        @endif

        <a href="{{ route('corriente.index') }}"> index corriente link</a>

    </div>

@endsection
