@extends('app')

@section('content')
    {!! Form::open([ 'route' => 'elementos.store', 'method' => 'POST']) !!}
        @include('elementos.partials.fields')

        <div class="form-group">
  		{!! Form::select('tipo_elementos_id', $tipo, null, ['class' => 'form-control'])!!}
		</div>{<!--  este es el select-->
        <button type="submit" class="btn btn-success btn-block">Guardar</button>
    {!! Form::close() !!}
@endsection