@extends('layouts.dashboard')
@section('title', "Editar Proteina")
@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="card shadow-sm mb-3 bg-white rounded" style="max-width: 550px;">
                <div class="card-header text-center">
                Actualizar Proteina
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
                    @isset($proteina)
                    <form action="{{ route('proteina.update',$proteina->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <label for="precio">Nombre:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre de la proteina" value="{{old('nombre',$proteina->name)}}">
                            <div class="custom-control mt-4 custom-switch">
                                <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="switch">
                                <label class="custom-control-label" for="switch">Habilitar en el menú</label>
                            </div>
                            <div class="d-flex pt-2 mt-4 justify-content-center">
                            <button type="submit" class="btn btn-outline-success block-center">Actualizar</button>
                            </div>
                            </form>
                    @endisset
                </div>
        </div>
    </div>
@endsection
