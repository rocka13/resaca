  <div id="panel" class="panel panel-default fondo">
    <div class="panel-heading" style="background-color: rgba(256,256,256,.1);">
          <center> <h3 class="text-danger text">Control de Elementos</h3>
    </div>
                        
      <div class="panel-body">
        <div class="dataTable_wrapper">
          <div class="container-fluid table-responsive">
          <a class="btn btn-primary pull-right" href="{{ url('/elementos/create') }}" role="button"><span class="glyphicon glyphicon-plus"></span> Elemento</a>
            <table class="table table-bordered cell-border table-hover" id="MyTable">
              <thead>
                <tr class="active">
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">tipo elemento</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
    @foreach($elementos as $telementos)
                <tr>
                    <td class="text-center">{{ $telementos->id }}</td>
                    <td class="text-center">{{ $telementos->nombre }}</td>
                    <td class="text-center">{{ $telementos->descripcion }}</td>
                    <td class="text-center">{{ $telementos->tipo }}</td>
                    <td class="text-center">{{ $telementos->created_at }}</td>
    {!! Form::open(['route' => ['elementos.destroy', $telementos->id], 'method' => 'DELETE']) !!}
                    <td class="text-center">
                        <button type="submit" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                        <a href="{{ url('/elementos/'.$telementos->id.'/edit') }}" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        </a>
                    </td>
    {!! Form::close() !!}
                </tr>
        @endforeach
            </tbody>
            <tfoot>
                <tr class="active">
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">tipo elemento</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </tfoot>
        </table>
            </div><!-- /container-fluit -->
          </div><!-- /datatable-wrapper -->
      </div><!-- /panel panel-body -->
  </div><!-- /panel panel-default -->
