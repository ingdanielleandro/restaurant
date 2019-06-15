@extends('layouts.dashboard')
@include('home.actionPro')
@include('home.actionPri')
@include('home.actionSop')
@section('title', "Almuerzo corriente")
@section('content')
<!-----------------------------COL 1 formulario--------------------------------->
<div class="row">
    <div class="col-md-6">
            <div class="card shadow-sm mb-3 bg-white rounded">
                <div class="card-header text-center">
                Almuerzo corriente
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
                    <form action="{{ route('corriente.store')}}" method="POST">
                    @csrf
                    <label for="precio">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del alimento" required>
                    <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="seleccion">Opciónes</label>
                    </div>
                    <select name="seleccion" class="custom-select" id="seleccion" required>
                    <option selected>Escoger...</option>
                    <option value="proteinas">Proteina</option>
                    <option value="principios">Principio</option>
                    <option value="sopas">Sopa</option>
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
                </div>
        </div>
        <div class="card shadow-sm mb-3 bg-white rounded">
            <div class="card-header text-center">
            Listado de Proteinas
            </div>
            <div class="card-body">
                @yield('actionPro') {{--Listado de proteinas--}}
            </div>
        </div>
    </div>

{{-- -----------------------------COL 2 Consulta Principios----------- --}}
<div class="col-md-6">
        <div class="card shadow-sm mb-3 bg-white rounded">
            <div class="card-header text-center">
            Listado de Principios
            </div>
            <div class="card-body">
                @yield('actionPri') {{--Listado de principios--}}
            </div>
        </div>
{{-- -----------------------------COL 2 Consulta Sopas----------- --}}
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
