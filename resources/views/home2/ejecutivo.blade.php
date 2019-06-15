@extends('layouts.dashboard')
@include('home.accionese')
@section('title', "Almuerzo ejecutivo")
@section('content')
<div class="row">
    <div class="col-md-7">
            <div class="card shadow-sm p-3 mb-3 bg-gradient-light rounded">
                <div class="card-header text-center">
                Almuerzo Ejecutivo
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
                    <form action="{{ route('ejecutivo.store')}}" method="POST">
                    @csrf
                    <h4 class="text-center">Agregar Almuerzo ejecutivo</h4>
                    <label for="precio">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del especial" required>
                    <label for="precio">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="precio" name="precio" class="form-control" placeholder="Precio del especial" aria-label="(COP)" required>
                        <div class="input-group-append">
                            <span class="input-group-text">COP</span>
                        </div>
                    </div>
                    <div class="col-auto my-1 mt-4">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="disponible">
                            <label class="custom-control-label" for="disponible">¿Disponible en el menú?</label>
                        </div>
                    </div>
                    <div class="d-flex pt-4 justify-content-center">
                    <button type="submit" class="btn btn-outline-success block-center">Agregar</button>
                    </div>
                    </form>
                </div>
        </div>
        <div class="card shadow-sm p-3 mb-3 bg-gradient-light rounded">
            <div class="card-header text-center">
              Almuerzo Ejecutivo
            </div>
            <div class="card-body">
                @yield('ejecutivos')
            </div>
          </div>
    </div>

{{-- -----------------------------impresion de la base de datos----------- --}}
<div class="col-md-5">
        <div class="card shadow-sm p-3 mb-3 bg-gradient-light rounded">
            <div class="card-header text-center">
            Almuerzo ejecutivo
            </div>
            <div class="card-body">
                @yield('accionese') {{--Listado de alimentos de la bd--}}
            </div>
        </div>
    </div>
</div>
@endsection
