@extends('layouts.dashboard')
@include('ejecutivo.actionEsp')
@section('title', "Ejecutivos")

@section('content')
<!-----------------------------COL 1 formulario--------------------------------->
<div class="row">
<div class="col-md-12">
    <div class="d-flex justify-content-center">
        <h4 class="display-4 text-info">EJECUTIVOS</h4>
    </div>
</div>
<div class="col-md-6">
        <div class="card shadow-sm mb-3 bg-white rounded">
            <div class="card-header text-center">
            Crear especial
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
                <label for="precio">Nombre:</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre del platillo" required>
                <label for="precio">Precio:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                        </div>
                        <input type="text" id="precio" name="precio" class="form-control" placeholder="Precio del platillo" aria-label="(COP)" required>
                        <div class="input-group-append">
                        <span class="input-group-text">COP</span>
                        </div>
                    </div>
                <div class="custom-control mt-4 custom-switch">
                    <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="switch">
                    <label class="custom-control-label" for="switch">Habilitar en el menú</label>
                </div>
                <div class="d-flex pt-2 mt-4 justify-content-center">
                <button type="submit" class="btn btn-outline-success block-center">Agregar</button>
                </div>
                </form>
            </div>
    </div>
</div>

{{-- -----------------------------COL 2 Consulta ejecutivos----------- --}}
<div class="col-md-6">
    <div class="card shadow-sm mb-3 bg-white rounded">
        <div class="card-header text-center">
        Listado de especiales
        </div>
        <div class="card-body">
            @yield('actionEsp') {{--Listado de platillos--}}
        </div>
    </div>
</div>
</div>
@endsection
