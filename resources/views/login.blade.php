
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
  {!! Form::open(['url' => url('resaca/auth')]) !!}
{!! Form::button('<i class="glyphicon glyphicon-link"></i> Autorizar',['class' => 'btn btn-primary','type'=>'submit']) !!}
{!! Form::close() !!}
</div>
</div>
{!!Html::script("js/jquery.js")!!}
{!!Html::script("js/bootstrap.min.js")!!}