@extends('app')

@section('content') 
    <a class="btn btn-success pull-right" href="{{ url('/tipo_elementos/create') }}" role="button">Nuevo Tipo Elemento</a>
    @include('tipo_elementos.partials.table')
@endsection