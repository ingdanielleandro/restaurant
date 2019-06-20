@section('menuPro')

<form class="was-validated" action="{{route('corriente.store')}}" method="POST">
    @csrf
<table class="table table-sm">
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
            <input type="checkbox" name="arrayPro[]" class="custom-control-input" value="{{$proteina->id}}" id="{{$proteina->name}}">
            <label class="custom-control-label" for="{{$proteina->name}}"></label>
        </div>
    </td>
    </tr>
    @empty
    <p class="text-danger">No hay proteinas disponibles.</p>
    @endforelse
</tbody>
</table>
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
            <a href="{{route('restorePro')}}" class="btn btn-outline-danger">Restablecer</a>
        </div>
</form>

@endsection
