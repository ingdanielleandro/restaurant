@extends('layouts.app')

@section('content')
    <div class="container">

    <ul class="list-group list-group-flush">
        <li class="list-group-item text-primary text-center">Proteinas</li>
        @forelse ($proteinas as $proteina)
        <li class="list-group-item">{{$proteina->name}}</li>
        @empty
        <p class="text-danger">No hay proteinas</p>
        @endforelse

        <li class="list-group-item text-primary text-center">Principios</li>
        @forelse ($principios as $principio)
        <li class="list-group-item">{{$principio->name}}</li>
        @empty
        <p class="text-danger">No hay principios</p>
        @endforelse

        <li class="list-group-item text-primary text-center">Sopas</li>
        @forelse ($sopas as $sopa)
        <li class="list-group-item">{{$sopa->name}}</li>
        @empty
        <p class="text-danger">No hay sopas</p>
        @endforelse
    </ul>

        <a href="{{ route('corriente.index') }}"> index corriente link</a>

    </div>

@endsection
