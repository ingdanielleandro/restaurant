@extends('layouts.home')

@section('title', "Inicio")

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="card text-dark mb-3" style="max-width: 100%;">
        <img src="img/vegetales.jpg" class="card-img-top" alt="vegetales">
        <div class="card-body">
            @if(isset($proteina))
            <h5 class="display-4">Menú del día</h5>
            @else
            <h5 class="display-4">Bienvenido</h5>
            @endif
        </div>
    </div>
</div>
</div>

@endsection
