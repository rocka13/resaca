@extends('admin')

@section('content')
    
    {!! Form::model($salas, [ 'route' => ['salas.update', $salas], 'method' => 'PUT']) !!}
       <div class="form-group">
		</div>
        @include('salas.partials.fields')
        <button type="submit" class="btn btn-success">Guardar cambios</button>
    {!! Form::close() !!}
@endsection