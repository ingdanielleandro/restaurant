@extends('layouts.dashboard')

@section('title', "Consumir corriente")

@section('content')

<div class="d-flex justify-content-center mb-4">
<div class="btn-group" role="group" aria-label="Basic example">
<a href="{{ route('consumirC.restore')}}" class="btn btn-info">Consumir todo</a>
    <a href="{{ route('corriente.create')}}" class="btn btn-info">Crear menú</a>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <div class="card shadow-sm bg-white rounded mb-3">
    <h5 class="card-header text-center">Almuerzo corriente</h5>
    <div class="card-body">
    <form action="{{ route('consumirC.store')}}" method="POST">
        @csrf
    <table class="table table-sm">
            @isset($proteinas)
            <thead>
                <th scope="col">Proteinas</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
            </thead>
            <tbody>
                @forelse ($proteinas as $proteina)
                <tr>
                <td>{{$proteina->name}}</td>
                <td>
                    @if($proteina->agotado === 0)
                    <span class="badge badge-pill badge-danger">agotado</span>
                    @php
                    $dis = 'disabled';
                    @endphp
                    @else
                    @php
                    $dis = '';
                    @endphp
                    @endif
                </td>
                <td>
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="proteina[]" value="{{$proteina->id}}" id="{{$proteina->name}}" {{$dis}}>
                    <label class="custom-control-label" for="{{$proteina->name}}">consumir</label>
                    </div>
                </td>
                </tr>
                @empty
                <p class="text-danger">¡ No hay proteinas !</p>
                @endforelse
            @endisset
            @isset($principios)
            <thead>
                <th scope="col">Principios</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @forelse ($principios as $principio)
                <tr>
                <td>{{$principio->name}}</td>
                <td>
                    @if($principio->agotado === 0)
                    <span class="badge badge-pill badge-danger">agotado</span>
                    @php
                    $dis = 'disabled';
                    @endphp
                    @else
                    @php
                    $dis = '';
                    @endphp
                    @endif
                </td>
                <td>
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="principio[]" value="{{$principio->id}}" id="{{$principio->name}}" {{$dis}}>
                    <label class="custom-control-label" for="{{$principio->name}}">consumir</label>
                    </div>
                </td>
                </tr>
                @empty
                <p class="text-danger">¡ No hay principios !</p>
                @endforelse
            @endisset
            @isset($sopas)
            <thead>
                <th scope="col">Sopas</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @forelse ($sopas as $sopa)
                <tr>
                <td>{{$sopa->name}}</td>
                <td>
                    @if($sopa->agotado === 0)
                    <span class="badge badge-pill badge-danger">agotado</span>
                    @php
                    $dis = 'disabled';
                    @endphp
                    @else
                    @php
                    $dis = '';
                    @endphp
                    @endif
                </td>
                <td>
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="sopa[]" value="{{$sopa->id}}" id="{{$sopa->name}}" {{$dis}}>
                    <label class="custom-control-label" for="{{$sopa->name}}">consumir</label>
                    </div>
                </td>
                </tr>
                @empty
                <p class="text-danger">¡ No hay sopas !</p>
                @endforelse
            @endisset
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-success">Aplicar cambios</button>
    </div>
    </form>
    </div>
    </div>
</div>
</div>

@endsection
