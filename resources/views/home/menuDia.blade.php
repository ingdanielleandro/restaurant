@section('menuDia')

<h1 class="display-4">Menú del día</h1>
<div class="card text-dark mb-3">
    <div class="card-body">
        @if(isset($proteinas))
        <div class="row align-items-start text-left">
                <div class="col-sm-12 col-md-4"><h5 class="text-center">Proteinas</h5>
                    <ul>
                    @forelse ($proteinas as $proteina)
                    <li>
                    @if($proteina->agotado === 1)
                    <p class="text-body">{{$proteina->name}}</p>
                    @else
                    <p><del>{{$proteina->name}}</del></p>
                    @endif
                    </li>
                    @empty
                        <p class="text-danger">No se han recibido datos</p>
                    @endforelse
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4"><h5 class="text-center">Principios</h5>
                    <ul>
                    @forelse ($principios as $principio)
                    <li>{{$principio->name}}</li>
                    @empty
                    <p class="text-danger">No se han recibido datos</p>
                    @endforelse
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4"><h5 class="text-center">Sopa</h5>
                    <ul>
                    @forelse ($sopas as $sopa)
                    <li>{{$sopa->name}}</li>
                    @empty
                    <p class="text-danger">No se han recibido datos</p>
                    @endforelse
                    </ul>
                </div>
        </div>
        <a href="#" class="btn btn-outline-primary">Pedir domicilio</a>
        @else
        <h5 class="display-4">Bienvenido</h5>
        @endif
    </div>
</div>

@endsection
