@section('accionese')
<table class="table table-borderless table-sm">
        <thead>
          <tr>
            <th scope="col">NOMBRE</th>
            <th scope="col">PRECIO</th>
            <th scope="col">DISPONIBLE</th>
          </tr>
        </thead>
        <tbody>
                @forelse ($ejecutivos as $ejecutivo)
          <tr>
            <td>
                {{$ejecutivo->name}}
            </td>
            <td>
                $ {{$ejecutivo->precio}}
            </td>
            <td>
                @if($ejecutivo->disponible == 0)
                No
                @else
                Si
                @endif
            </td>
            <td>
                <div class="d-flex bd-highlight">
                <div class="flex-fill bd-highlight">
                    <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-primary"><i class="far fa-edit"></i></button>
                    </form>
                </div>
                <div class="flex-fill bd-highlight">
                    <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
                </div>
            </td>
          </tr>
          @empty
          <p class="text-danger">No hay almuerzos ejecutivos</p>
      @endforelse
    </tbody>
</table>
@endsection
