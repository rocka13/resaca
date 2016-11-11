@extends('admin')

@section('content') 
    <select id="select1" name="producto">
    	@foreach($tipo as $result)
				<option value="{{$result->id }}">{{ $result->nombres.' '.$result->apellidos }}</option>
		 @endforeach
	</select>
</div>
@endsection


                   