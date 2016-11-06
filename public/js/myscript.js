$(document).ready(function(){
  var tablaDatos = $("#datos");
  var route = "http://8000/salas/elementos_salas";

  $.get(route, function(res){
  		$(res).each(function(key, value){

  			tablaDatos.append("<tr><td>"+value.elementos_salas+"</td></tr>");
  		});

  });

});