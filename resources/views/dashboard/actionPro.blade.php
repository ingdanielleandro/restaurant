@section('actionPro')
{{-- -----------------PROTEINAS-------------------------}}
<table class="table table-borderless table-sm">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($proteinas as $proteina)
                <tr>
                <td>
                    {{$proteina->name}}
                </td>
                <td>
                    @if($proteina->disponible === true)
                    <span class="badge badge-pill badge-success">on</span>
                    @else
                    <span class="badge badge-pill badge-danger">off</span>
                    @endif
                </td>
                <td>
                <form action="{{route('proteina.destroy', $proteina->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <a href="{{ route('proteina.edit',$proteina->id)}}" class="btn btn-link text-primary"><i class="far fa-edit"></i></a>
                    <button type="submit" class="btn btn-link-secundary"><i class="fas fa-trash-alt"></i></button>
                </form>
                </td>
                </tr>
                @empty
                <p class="text-danger">No hay proteinas</p>
            @endforelse
        </tbody>
    </table>
@endsection
