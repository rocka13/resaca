@extends('app')

@section('content') 
    <a class="btn btn-success pull-right" href="{{ url('/elementos_salas/create') }}" role="button">Nuevo Tipo Elemento</a>
    @include('elementos_salas.partials.table')
@endsection