@extends('admin')

@section('content')
    
    {!! Form::model($tipo_elementos, [ 'route' => ['tipo_elementos.update', $tipo_elementos], 'method' => 'PUT']) !!}
        @include('tipo_elementos.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection