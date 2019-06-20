@extends('layouts.dashboard')
@include('corriente.actionSop')
@section('title', "Sopas")
@section('content')
<!-----------------------------COL 1 formulario--------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <h4 class="display-4 text-info">SOPAS</h4>
        </div>
    </div>
    <div class="col-md-6">
            <div class="card shadow-sm mb-3 bg-white rounded">
                <div class="card-header text-center">
                Crear sopa
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
                    <form action="{{ route('sopa.store')}}" method="POST">
                    @csrf
                    <label for="precio">Nombre:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre del alimento" required>
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

{{-- -----------------------------COL 2 Consulta sopas----------- --}}
<div class="col-md-6">
    <div class="card shadow-sm mb-3 bg-white rounded">
        <div class="card-header text-center">
        Listado de Sopas
        </div>
        <div class="card-body">
            @yield('actionSop') {{--Listado de sopas--}}
        </div>
    </div>
</div>
</div>
@endsection
