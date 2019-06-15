
@extends('layouts.dashboard')
@section('title', "Proteinas")
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center mb-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning text-white" data-toggle="modal" data-target="#exampleModalScrollable">
                Ver Menú
              </button>
            </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalScrollableTitle">Almuerzo corriente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        @isset($estadoPro)
                        <h5 class="text-primary">Proteinas</h5>
                            @forelse ($estadoPro as $protein)
                            <ul>
                            <li>{{$protein->name}}</li>
                            </ul>
                            @empty
                            <p class="text-danger">¡ Menú vacio !</p>
                            @endforelse
                        @endisset
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            Proteinas
            </div>
        @isset($disponiblePro)
            <div class="card-body">
        <form class="was-validated" action="{{route('corriente.store')}}" method="POST">
                @csrf
            <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Habilitar</th>
                </tr>
        </thead>
        <tbody>
                @forelse ($disponiblePro as $proteina)
            <tr>
                <td>
                    {{$proteina->name}}
                </td>
                <td>
                    @if($proteina->estado === true)
                    <span class="badge badge-pill badge-success">on</span>
                    @else
                    <span class="badge badge-pill badge-danger">off</span>
                    @endif
                </td>
                <td>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="array[]" class="custom-control-input" value="{{$proteina->id}}" id="{{$proteina->id}}">
                            <label class="custom-control-label" for="{{$proteina->id}}"></label>
                        </div>
                    </td>
                </tr>
                @empty
                <p class="text-danger">No hay proteinas disponibles.</p>
                @endforelse
            </tbody>
        </table>
        <div class="text-center">
        <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
        <a href="{{route('restore')}}" class="btn btn-outline-danger">Restablecer</a>
        </div>
    </form>
</div>
            @endisset
    </div>
</div>
<div class="col-md-6">
    {{--------------------------- PRINCIPIOS----------------------- --}}
<div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
{{--------------------------- PRINCIPIOS----------------------- --}}
<div class="card">
        <div class="card-header">
          Featured
        </div>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
</div>
@endsection
