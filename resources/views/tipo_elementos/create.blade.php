@extends('admin')

@section('content')
    {!! Form::open([ 'route' => 'tipo_elementos.store', 'method' => 'POST']) !!}
        @include('tipo_elementos.partials.fields')
        <button type="submit" class="btn btn-success btn-block">Guardar</button>
    {!! Form::close() !!}
@endsection