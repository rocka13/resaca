<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
        {!!Html::style("css/select2.min.css")!!}
        {!!Html::style("css/bootstrap.min.css")!!}
        {!!Html::style("css/dataTables.bootstrap.min.css")!!}
        {!!Html::style("css/responsive.bootstrap.min.css")!!}
        {!!Html::style("css/font-awesome.min.css")!!}
        {!!Html::style("css/sb-admin-2.css")!!}
        {!!Html::style("css/stilo.css")!!}

        {!!Html::style("timepicker/jquery.timepicker.css")!!}
        {!!Html::style("timepicker/bootstrap-datepicker.css")!!}
        {!!Html::style("timepicker/site.css")!!}
        
        

</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".menu-responsive">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" id="titulo">Reservas de Salas Académicas</a>
            </div>
           
<div class="collapse navbar-collapse menu-responsive" id="usuario">
            <ul class="nav navbar-top-links navbar-right">
                 <li>
                    <a href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-reply"></i>
                    </a>
                </li>
               <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" role="menu">
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li> -->
                    </ul>
                </li>
            </ul>
</div>
            <div class="navbar-default sidebar " role="navigation">
                <div class="sidebar-nav navbar-collapse collapse  menu-responsive" id="navbar-collapse">
                    <ul class="nav " id="side-menu">
                    <li>
                            <a id="administrar" href=""><i class="fa fa-table  fa-fw"></i> Administrar<span class="fa abajo"></span></a>
                            <ul class="nav nav-second-level" id="administrar-oculto">
                                <li>
                                    <a href="{!! URL::to('tipo_elementos') !!}"><i class='fa fa-list-ol fa-fw'></i> Tipo Elemento</a>
                                </li>

                                <li>
                                    <a href="{!! URL::to('elementos') !!}"><i class='fa fa-list-ol  fa-fw'></i> Elementos</a>
                                </li>
                                  <li>
                                    <a href="{!! URL::to('salas') !!}"><i class='fa fa-list-ol  fa-fw'></i> Salas</a>
                                </li>
                                  <li>
                                    <a href="{!! URL::to('elementos_salas') !!}"><i class='fa fa-list-ol fa-plus fa-fw'></i> Elementos en Salas</a>
                                </li>
                                    <li>
                                    <a href="{!! URL::to('reservas') !!}"><i class='fa fa-list-ol fa-plus fa-fw'></i> Reservas</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Reservas</a>
                        </li>
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
        <br>
            @yield('content')
        </div>

    </div>

    <footer>
        <h4>© 2016 RYCA <a href="">ITFIP </a> <a href="">developers</a></h4>
    </footer>
    {!!Html::script("js/jquery.js")!!}
    {!! Html::script("js/select2.min.js") !!}
    {!!Html::script("js/bootstrap.min.js")!!}
    {!! Html::script("js/jquery.dataTables.min.js") !!}
    {!! Html::script("js/dataTables.responsive.min.js") !!}
    {!! Html::script("js/dataTables.bootstrap.min.js") !!}

    {!! Html::script("timepicker/jquery.timepicker.min.js") !!}
    {!! Html::script("timepicker/bootstrap-datepicker.js") !!}
    {!! Html::script("timepicker/site.js") !!}
    {!! Html::script("timepicker/bootstrap-datepicker.es.min.js") !!}




    <script>
        $(document).ready(function(){
            tablas();
            administrar();
            seleccion();
            calendario();
            hora();

        });

//--------------------------------datatables---------------------

        function tablas(){

            $('#MyTable').dataTable({
                "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
            });
            
        }
//--------------------------------------togle de mostrar y ocultar administrar
        function administrar()
        {
            $("#administrar").click(function(event){
                event.preventDefault();
                $("#administrar-oculto").toggle("fast");
            });
        }
//_______________--select dinamico con busqueda_________________________
        function seleccion()
        {
                $(".select").select2();
        }
//-----------------------------calendario dinamico-------------------------
       function calendario()
       {
        $.fn.datepicker.defaults.format = "yyyy/mm/dd";
         $('.calendario').datepicker({
            format: "yyyy/mm/dd",
            language: "es",
            autoclose: true
    });
                    
       }

//----------------------------calendario hora---------------------------

        function hora()
        {
           $('.hora').timepicker({ 'timeFormat': 'H:i' });
        }
    </script>

   
</body>

</html>
