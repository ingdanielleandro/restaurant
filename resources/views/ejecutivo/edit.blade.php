@extends('layouts.dashboard')
@section('title', "Editar Especial")
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm mb-3 bg-white rounded" style="max-width: 550px;">
            <div class="card-header text-center">
            Actualizar Especial
            </div>
            <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                @isset($ejecutivo)
                <form action="{{ route('ejecutivo.update',$ejecutivo->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="precio">Nombre:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre del platillo" value="{{old('nombre',$ejecutivo->name)}}" required>
                    <label for="precio">Precio:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                            </div>
                            <input type="text" id="precio" name="precio" class="form-control" placeholder="Precio del platillo" aria-label="(COP)" value="{{old('precio',$ejecutivo->precio)}}" required>
                            <div class="input-group-append">
                            <span class="input-group-text">COP</span>
                            </div>
                        </div>
                    <div class="custom-control mt-4 custom-switch">
                        <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="switch">
                        <label class="custom-control-label" for="switch">Habilitar en el menú</label>
                    </div>
                    <div class="d-flex justify-content-around pt-2 mt-4">
                        <a href="{{ route('ejecutivo.create')}}" class="btn btn-outline-warning block-center">Cancelar</a>
                        <button type="submit" class="btn btn-outline-success block-center">Actualizar</button>
                    </div>
                </form>
                @endisset
            </div>
        </div>
    </div>
@endsection
