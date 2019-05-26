@extends('layouts.dashboard')
@section('content')

<h1>dashboard</h1>

<a href="{{route('corriente.create')}}">Crear menú corriente</a>
<a href="{{route('ejecutivo.create')}}">Crear menú ejecutivo</a>

@endsection
