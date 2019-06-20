
@extends('layouts.dashboard')

@section('title', "Corriente")

@include('menu.menuPro')
@include('menu.menuPri')
@include('menu.menuSop')
@include('menu.modalMenu')

@section('content')
<div class="d-flex justify-content-center">
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalScrollable">Ver Menú</button>
    <a href="{{ route('restoreAll')}}" class="btn btn-info">Restablecer todo</a>
<a href="{{ route('consumirC.create')}}" class="btn btn-info">Consumir</a>
</div>
</div>
<div class="row">
    <div class="col-md-12">
<!------------------------ Modal ------------------------------->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Almuerzo corriente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @yield('modalMenu')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    </div>
<div class="col-md-6">
{{--------------------------- PROTEINAS----------------------- --}}
    <div class="card mt-3 shadow-sm mb-3 bg-white rounded">
            <div class="card-header text-center">
            Proteinas
            </div>
        @isset($disponiblePro)
            <div class="card-body">
                @yield('menuPro') {{--listado de proteinas--}}
            </div>
        @endisset
    </div>
</div>
<div class="col-md-6">
{{--------------------------- PRINCIPIOS----------------------- --}}
    <div class="card mt-3 shadow-sm mb-3 bg-white rounded">
            <div class="card-header text-center">
            Principios
            </div>
        @isset($disponiblePri)
            <div class="card-body">
                @yield('menuPri') {{--listado de principios--}}
            </div>
        @endisset
    </div>
</div>
<div class="col-md-12 d-flex justify-content-md-center">
{{---------------------------SOPAS----------------------- --}}
<div class="card mt-3 shadow-sm mb-3 bg-white rounded" style="width: 35rem;">
        <div class="card-header text-center">
        Sopas
        </div>
    @isset($disponibleSop)
        <div class="card-body">
            @yield('menuSop') {{--listado de sopas--}}
        </div>
    @endisset
</div>
</div>
</div>
@endsection
