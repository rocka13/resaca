@extends('admin')

@section('content')
    {!! Form::open([ 'route' => 'elementos.store', 'method' => 'POST']) !!}
        @include('elementos.partials.fields')

        <div class="form-group">
  		{!! Form::select('tipo_elemento_id', $tipo, null, ['class' => 'form-control'])!!}
		</div>
        <button type="submit" class="btn btn-success btn-block">Guardar</button>
    {!! Form::close() !!}
@endsection