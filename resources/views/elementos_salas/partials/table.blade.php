<h1 class="text-primary">Control de elementos en la sala</h1>
<div class="table-responsive">
<table class="table table-bordered cell-border table-hover" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Aula</th>
        <th class="text-center">Elemento</th>
        <th class="text-center">Cantida</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($elementos_salas as $telementos)
        <tr>
            <td class="text-center">{{ $telementos->id }}</td>
            <td class="text-center">{{ $telementos->sala }}</td>
            <td class="text-center">{{ $telementos->elemento }}</td>
            <td class="text-center">{{ $telementos->cantidad }}</td>

        {!! Form::open(['route' => ['elementos_salas.destroy', $telementos->id], 'method' => 'DELETE']) !!}

            <td class="text-center">
                <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <a href="{{ url('/elementos_salas/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
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
        <th class="text-center">Aula</th>
        <th class="text-center">Elemento</th>
        <th class="text-center">Cantida</th>
        <th class="text-center">Acciones</th>
    </tr>
  </tfoot>
</table>
</div>