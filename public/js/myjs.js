            $(document).ready(function(){
            tablas();
            administrar();
            seleccion();
            calendario();
            SolicitarHora();
        

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

//---------------------------solicitar La hora
        function SolicitarHora()
        {
            $('#fecha_servicio, #sala').change(function()
            {
                var fecha = $('#fecha_servicio').val(); 
                var aula = $('#sala').val(); 
                var ruta = "/horas/fecha";

                 $.getJSON(ruta+'/'+fecha+'/aula/'+aula, function(data)
                {     
                        $.each(data, function(i, item) 
                        {  
                            console.log(item);
                           $('#respuesta').html(item);
                            $('.hora1').val("00:00").timepicker(
                           {    
                                useSelect:true,
                                disableTextInput: true,
                                timeFormat: 'H:i',
                                disableTimeRanges: item.inicio,
                                orientation: "r",
                                step: '60',
                            });                   
                               $('.hora2').val("00:00").timepicker(
                           {   
                                useSelect:true,
                                disableTextInput: true,
                                timeFormat: 'H:i',
                                disableTimeRanges: item.final,
                                orientation: "r",
                                step: '60',
                            }); 
                            $('.ui-timepicker-select').addClass('btn btn-warning form-control '); 
                        });  
                                     
                });
           
            });

 }
            
//---------------------------prueb
