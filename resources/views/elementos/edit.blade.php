@extends('app')

@section('content')
    
    {!! Form::model($elementos, [ 'route' => ['elementos.update', $elementos], 'method' => 'PUT']) !!}
       <div class="form-group">
		</div>
        @include('elementos.partials.fields')
         <div class="form-group">
  		{!! Form::select('tipo_elementos_id', $tipo, null, ['class' => 'form-control'])!!}
		</div>
        <button type="submit" class="btn btn-success btn-block">Guardar cambios</button>
    {!! Form::close() !!}
@endsection