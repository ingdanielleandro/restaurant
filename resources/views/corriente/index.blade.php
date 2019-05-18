@extends('layouts.app')
@include('corriente.radios')

@section('content')
    <div class="container">

        <h1 class="display-4">{{ $title }}</h1>

        <form action="{{ route('corriente.store')}}" method="POST">
            @csrf
                @yield('radios') {{-- Radio buttons del formulario--}}
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
