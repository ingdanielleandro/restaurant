
@section('radios')

{{-- Radio buttons de proteinas--}}
<h5 class="alert alert-primary" role="alert">Proteinas</h5>
        @if($proteinas->isNotEmpty())
        @foreach ($proteinas as $proteina)
            @if($proteina->estado == true)
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="proteina" id="{{$proteina->name}}" value="{{$proteina->id}}" {{$estado='required'}}>
                <label class="custom-control-label" for="{{$proteina->name}}"><h5>{{$proteina->name}}</h5></label>
            </div>
            @else
            <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="proteina" id="{{$proteina->name}}" value="{{$proteina->id}}" disabled>
            <label class="custom-control-label" for="{{$proteina->name}}"><h5>{{$proteina->name}}</h5></label>
            <span class="text-danger font-italic">(Agotado)</span>
            </div>
            @endif
        @endforeach
        @else
        <h5 class="text-danger" role="alert">No hay proteinas en la BD</h5>
        @endif



        {{-- Radio buttons de principios--}}
            <h5 class="alert alert-primary" role="alert">Principios</h5>
            @if($principios->isNotEmpty())
            @foreach ($principios as $principio)
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="principio" id="{{$principio->name}}" value="{{$principio->id}}" required>
                <label class="custom-control-label" for="{{$principio->name}}"><h5>{{ $principio->name}}</h5></label>
                </div>
            @endforeach
            @else
            <h5 class="text-danger" role="alert">No hay principios en la BD</h5>
            @endif




        {{-- Radio buttons de sopa--}}
        <h5 class="alert alert-primary" role="alert">Sopa</h5>
        @if($sopas->isNotEmpty())
        @foreach ($sopas as $sopa)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" name="sopa" id="{{$sopa->name}}" value="{{$sopa->id}}" required>
            <label class="custom-control-label" for="{{$sopa->name}}"><h5>{{ $sopa->name}}</h5></label>
            </div>
        @endforeach
        @else
        <h5 class="text-danger" role="alert">No hay sopas en la BD</h5>
        @endif
@endsection
