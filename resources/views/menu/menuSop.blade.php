@section('menuSop')

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
    @forelse ($disponibleSop as $sopa)
<tr>
    <td>
        {{$sopa->name}}
    </td>
    <td>
        @if($sopa->estado === true)
        <span class="badge badge-pill badge-success">on</span>
        @else
        <span class="badge badge-pill badge-danger">off</span>
        @endif
    </td>
    <td>
            <div class="custom-control custom-switch">
                <input type="checkbox" name="arraySop[]" class="custom-control-input" value="{{$sopa->id}}" id="{{$sopa->name}}">
                <label class="custom-control-label" for="{{$sopa->name}}"></label>
            </div>
        </td>
    </tr>
    @empty
    <p class="text-danger">No hay sopas disponibles.</p>
    @endforelse
</tbody>
</table>
        <div class="d-flex justify-content-around">
            <button type="submit" class="btn btn-outline-primary">Guardar cambios</button>
            <a href="{{route('restoreSop')}}" class="btn btn-outline-danger">Restablecer</a>
        </div>
</form>

@endsection
