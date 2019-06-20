@section('actionPri')
{{-- -----------------PRINCIPIOS-------------------------}}
<table class="table table-borderless table-sm">
            <thead>
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($principios as $principio)
                <tr>
                <td>
                    {{$principio->name}}
                </td>
                <td>
                    @if($principio->disponible === true)
                    <span class="badge badge-pill badge-success">on</span>
                    @else
                    <span class="badge badge-pill badge-danger">off</span>
                    @endif
                </td>
                <td>
                <form action="{{route('principio.destroy', $principio->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="d-flex p-2 bd-highlight">
                        <a href="{{ route('principio.edit',$principio->id)}}" class="btn btn-link text-primary"><i class="far fa-edit"></i></a>
                        <button type="submit" class="btn btn-link-secundary"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </form>
                </td>
                </tr>
                @empty
                <p class="text-danger">No hay principios</p>
            @endforelse
        </tbody>
    </table>
@endsection
