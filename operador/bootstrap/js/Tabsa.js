/*Lista todas las solicitudes de los servicios*/
$(document).on("click","#solicitarSer", function () {
	var solicitarSer="aceptar solicitud";
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{data:solicitarSer},
    })
    .done(function(respuesta){
    	$('#solicitudesEn').html(respuesta);
    })
})
/*Aceptar las solicitudes y enviar correo*/
$(document).on("click","#aceptarSer", function () {
	var confirmar=$(this).data('num_fact');
	alert(confirmar);
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{confirmar:confirmar},
    })
    .done(function(respuesta){
    	alert(respuesta);
    	//$('#solicitudesEn').html(respuesta);
    })
})
