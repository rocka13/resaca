@extends('admin')

@section('content')
    {!! Form::open([ 'route' => 'reservas.buscar', 'method' => 'POST']) !!}
    	 <div class="form-group">
        {!! Form::label('usuario', 'Busca el usuario:', ['for' => 'usuario'] ) !!}  
        <select name="usuario" class="form-control select">
            @foreach($usuarios as $result)
                <option value="{{ $result->id }}">{{ $result->nombres.' '.$result->apellidos }}</option>
            @endforeach
        </select>
        </div>
		@include('reservas_salas.partials.fields')
        <button type="submit" class="btn btn-success">Reservar</button>
    {!! Form::close() !!}
@endsection

