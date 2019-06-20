@section('modalMenu')
<table class="table">
@isset($estadoPro)
<h5 class="text-primary">Proteinas</h5>
    @forelse ($estadoPro as $protein)
    <ul>
    <li>{{$protein->name}}</li>
    </ul>
    @empty
    <p class="text-danger">¡ No hay proteinas !</p>
    @endforelse
@endisset

@isset($estadoPri)
<h5 class="text-primary">Principios</h5>
    @forelse ($estadoPri as $princip)
    <ul>
    <li>{{$princip->name}}</li>
    </ul>
    @empty
    <p class="text-danger">¡ No hay principios !</p>
    @endforelse
@endisset

@isset($estadoSop)
<h5 class="text-primary">Sopas</h5>
    @forelse ($estadoSop as $sop)
    <ul>
    <li>{{$sop->name}}</li>
    </ul>
    @empty
    <p class="text-danger">¡ No hay sopas !</p>
    @endforelse
@endisset
</table>
@endsection
