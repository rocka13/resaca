<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
{!!Html::style("css/bootstrap.min.css")!!}
{!!Html::style("css/metisMenu.min.css")!!}
{!!Html::style("css/font-awesome.min.css")!!}
{!! Html::style('css/datatable-bootstrap.css') !!}
{!!Html::style("css/sb-admin-2.css")!!}


</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" id="titulo">Resaca</a>
            </div>
           
<div class="collapse navbar-collapse">
            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" role="menu">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
</div>
            <div class="navbar-default sidebar hidden-xs" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!! URL::to('usuarios/create') !!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>

                                <li>
                                    <a href="{!! URL::to('usuarios') !!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li>
                            <a href="#"><i class="fa fa-film fa-fw"></i> Pelicula<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Peliculas</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-child fa-fw"></i> Genero<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="#"><i class='fa fa-list-ol fa-fw'></i> Generos</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>

    <footer>
        <h4>© 2016 RYCA <a href="">ITFIP </a> <a href="">developers</a></h4>
    </footer>
    {!!Html::script("js/jquery.min.js")!!}
    {!! Html::script('js/jquery.dataTables.js') !!}
    {!!Html::script("js/bootstrap.min.js")!!}
    {!!Html::script("js/metisMenu.min.js")!!}
    {!!Html::script("js/sb-admin-2.js")!!}
    <script>
        $(document).ready(function(){
            $('#MyTable').dataTable();
        });
    </script>
</body>

</html>
