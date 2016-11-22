@extends('admin')

@section('content') 
@include('alertas.success')
    @include('reservas_salas.partials.table')
@endsection