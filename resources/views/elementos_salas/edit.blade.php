@extends('app')

@section('content')
    
    {!! Form::model($elementos_salas, [ 'route' => ['elementos_salas.update', $elementos_salas], 'method' => 'PUT']) !!}
       <div class="form-group">
		</div>
		<div class="form-group">
        {!! Form::label('salas', 'salas', ['for' => 'salas'] ) !!}
        {!! Form::select('sala_id', [$salas], null, ['class' => 'form-control'])!!}
		</div>
		 <div class="form-group">
         {!! Form::label('elementos', 'elementos', ['for' => 'elementos'] ) !!}
        {!! Form::select('elemento_id', [$elementos], null,  ['class' => 'form-control'])!!}
		</div>
        @include('elementos_salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection