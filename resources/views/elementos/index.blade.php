@extends('admin')

@section('content') 
    <a class="btn btn-success pull-right" href="{{ url('/elementos/create') }}" role="button">Nuevo Tipo Elemento</a>
    @include('elementos.partials.table')
@endsection