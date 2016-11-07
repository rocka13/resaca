@extends('admin')

@section('content') 
    <a class="btn btn-success pull-right" href="{{ url('/salas/create') }}" role="button">Nuevo Tipo Elemento</a>
    @include('salas.partials.table')
@endsection