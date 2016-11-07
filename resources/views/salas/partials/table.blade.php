<h1 class="text-primary">Control de Salas</h1>
<div class="table-responsive">
<table class="table table-bordered cell-border table-hover" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Aula Ryca</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($salas as $telementos)
        <tr>
            <td class="text-center">{{ $telementos->id }}</td>
            <td class="text-center">{{ $telementos->nombre }}</td>
            <td class="text-center">{{ $telementos->id_aula_ryca }}</td>

        {!! Form::open(['route' => ['salas.destroy', $telementos->id], 'method' => 'DELETE']) !!}

            <td class="text-center">
                <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <a href="{{ url('/salas/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                 <a href="{{ url('/ver/elementos/'.$telementos->id) }}" class="btn btn-warning btn-xs">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
            </td>

        {!! Form::close() !!}

        </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
         <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Aula Ryca</th>
        <th class="text-center">Acciones</th>
    </tr>
  </tfoot>
</table>
</div>