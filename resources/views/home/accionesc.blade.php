@section('accionesc')
<table class="table table-borderless table-sm">
{{-- -----------------PROTEINAS-------------------------}}
        <thead>
          <tr>
            <th scope="col">PROTEINAS</th>
            <th scope="col">DISPONIBLE</th>
            <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
                @forelse ($proteinas as $proteina)
          <tr>
            <td>
                {{$proteina->name}}
            </td>
            <td>
                @if($proteina->disponible === 1)
                    <div class="custom-control custom-switch">
                    <input type="checkbox" name="switch" value="1" class="custom-control-input" id="{{$proteina->id}}" checked="checked">
                    <label class="custom-control-label" for="{{$proteina->id}}"></label>
                    </div>
                @else
                <div class="custom-control custom-switch">
                    <input type="checkbox" name="switch" value="0" class="custom-control-input" id="{{$proteina->id}}">
                    <label class="custom-control-label" for="{{$proteina->id}}" data-off="Off" data-on="On"></label>
                    </div>
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
          <p class="text-danger">No hay proteinas</p>
      @endforelse
        </tbody>
{{-- -----------------PRINCIPIOS-------------------------}}
            <thead>
              <tr>
                <th scope="col">PRINCIPIOS</th>
              </tr>
            </thead>
            <tbody>
                    @forelse ($principios as $principio)
              <tr>
                <td>
                    {{$principio->name}}
                </td>
                <td>
                    @if($principio->disponible === 0)
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
              <p class="text-danger">No hay proteinas</p>
          @endforelse
        </tbody>
    </table>
@endsection
