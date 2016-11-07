<h1 class="text-primary">Control de Elementos</h1>
<div class="table-responsive">
<table class="table table-bordered cell-border table-hover" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Descripcion</th>  
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tipo_elementos as $telementos)
        <tr>
            <td class="text-center">{{ $telementos->id }}</td>
            <td class="text-center">{{ $telementos->descripcion }}</td>
        <td class="text-center">{{ $telementos->created_at }}</td>

        {!! Form::open(['route' => ['tipo_elementos.destroy', $telementos->id], 'method' => 'DELETE']) !!}

            <td class="text-center">
                <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <a href="{{ url('/tipo_elementos/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
            </td>

        {!! Form::close() !!}

        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
       <th class="text-center">ID</th>
        <th class="text-center">Descripcion</th>  
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
    </tr>
  </tfoot>
</table>
</div>