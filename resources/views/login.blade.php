
 {!!Html::style("css/bootstrap.min.css")!!}
 <style type="text/css">
 	body
 	{
 		background-color: #8C0404;
 		color:#fff;
 	}
	.container
	{
	margin-top:200px;
	}
 	.login
 	{	
 		margin:auto;
 		width: 60%;
	}
   .entrar
   {
   	background-color: #303192;
   }
 	
 </style>
 <div class="container">
 <div class="login">
{!!Form::open(['route'=>'login.store', 'method' =>'POST'])!!}
     <div class="form-group">
         <label for="inputEmail">Correo</label>
         <input name="email" type="text" class="form-control" placeholder="Email">
     </div>
     <div class="form-group">
         <label for="inputPassword">Contraseña</label>
         <input name="password" type="password" class="form-control" placeholder="Contraseña">
     </div>
     <div class="checkbox">
         <label><input type="checkbox">Recuerdame</label>
     </div>
     <button type="submit" class="btn entrar">Entrar</button>
{!!Form::close()!!}
</div>
</div>
{!!Html::script("js/jquery.js")!!}
{!!Html::script("js/bootstrap.min.js")!!}