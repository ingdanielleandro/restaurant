@extends('layouts.dashboard')
@section('title', "Editar Principio")
@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="card shadow-sm mb-3 bg-white rounded">
                <div class="card-header text-center">
                Actualizar Principio
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
                    @isset($principio)
                    <form action="{{ route('principio.update',$principio->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <label for="precio">Nombre:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre del principio" value="{{old('nombre',$principio->name)}}">
                            <div class="input-group mb-3 mt-3">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="seleccion">Opciónes</label>
                            </div>
                            <select name="seleccion" class="custom-select" id="seleccion" disabled>
                                    <option selected>Principio</option>
                                    </select>
                            </div>
                            <div class="custom-control mt-4 custom-switch">
                                <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="switch">
                                <label class="custom-control-label" for="switch">Habilitar en el menú</label>
                            </div>
                            <div class="d-flex pt-2 mt-4 justify-content-center">
                            <button type="submit" class="btn btn-outline-success block-center">Agregar</button>
                            </div>
                            </form>
                    @endisset
                </div>
        </div>
    </div>
@endsection
