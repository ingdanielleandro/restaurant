@extends('layouts.dashboard')
@include('home.accionesc')
@section('content')
<!-----------------------------COL 1 formularios --------------------------------->
<div class="row">
    <div class="col-md-7">
            <div class="card shadow-sm p-3 mb-3 bg-white rounded">
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
                    <h4 class="text-center">Agregar alimento</h4>
                    <div class="input-group mb-3 mt-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="seleccion">Opciónes</label>
                    </div>
                    <select name="seleccion" class="custom-select" id="seleccion" required>
                    <option selected>Escoger...</option>
                    <option value="proteinas">Proteina</option>
                    <option value="principios">Principio</option>
                    </select>
                    </div>
                    <label for="precio">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del alimento" required>
                    <div class="custom-control mt-4 custom-switch">
                        <input type="checkbox" name="disponible" value="1" class="custom-control-input" id="switch">
                        <label class="custom-control-label" for="switch">¿Disponible en el Menú?</label>
                    </div>
                    <div class="d-flex pt-4 mt-4 justify-content-center">
                    <button type="submit" class="btn btn-outline-success block-center">Agregar</button>
                    </div>
                    </form>
                </div>
        </div>
        <div class="card shadow-sm p-3 mb-3 bg-white rounded">
            <div class="card-header text-center">
              Almuerzo Ejecutivo
            </div>
            <div class="card-body">
                {{-- @yield('ejecutivos') --}}
            </div>
          </div>
    </div>

{{-- -----------------------------COL 2 Consulta tabla proteinas, principios, sopas----------- --}}
<div class="col-md-5">
        <div class="card shadow-sm p-3 mb-3 bg-white rounded">
            <div class="card-header text-center">
            Alimentos guardados
            </div>
            <div class="card-body">
                @yield('accionesc') {{--Listado de alimentos--}}
            </div>
        </div>
    </div>
</div>
@endsection
