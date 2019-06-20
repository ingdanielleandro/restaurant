@section('actionEsp')
{{-- -----------------ESPECIALES-------------------------}}
<table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($ejecutivos as $key => $ejecutivo)
                <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <p>{{$ejecutivo->name}}</p>
                </td>
                <td>
                    <p>${{$ejecutivo->precio}}</p>
                </td>
                <td>
                    @if($ejecutivo->disponible === true)
                    <span class="badge badge-pill badge-success">on</span>
                    @else
                    <span class="badge badge-pill badge-danger">off</span>
                    @endif
                </td>
                <td>
                <form action="{{ route('ejecutivo.destroy',$ejecutivo->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="d-flex p-2 bd-highlight">
                    <a href="{{ route('ejecutivo.edit',$ejecutivo->id)}}" class="btn btn-link text-primary"><i class="far fa-edit"></i></a>
                        <button type="submit" class="btn btn-link-secundary"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </form>
                </td>
                </tr>
                @empty
                <p class="text-danger">No hay ejecutivos</p>
            @endforelse
        </tbody>
    </table>
@endsection
