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
	var enviar=$(this).data('num_fact');
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{enviar:enviar},
    })
    .done(function(respuesta){
    	alert(respuesta);
    	//$('#solicitudesEn').html(respuesta);
    })
})

/*Lista de todas las solicitudes que han sido confirmadas por el usuario*/
$(document).on("click","#confirmarSer", function () {
	var confirmarSer="confirmar solicitud";
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{confirmarSer:confirmarSer},
    })
    .done(function(respuesta){
    	$('#solicitudesEn').html(respuesta);
    })
})

/*operadores disponibles para las peticiones*/
$(document).on("click","#enviarOpe", function () {
	var factura=$(this).data('num_fact');
	document.getElementById('folioFactura').value=factura;
	var selection= document.getElementById('comboOpe');
	var length=selection.options.length;
		while(length--){
		selection.remove(length);
	}
	var operador="operador disponible";
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{operador:operador},
    })
    .done(function(respuesta){
    	var filas = respuesta.split('#');
    	for(var i=0; i<filas.length-1; i++){
    		var datos=filas[i].split('?');
			$("#comboOpe").append("<option value="+datos[0]+">"+datos[1]+"</option>");
		}
    })
})

/*enviar Operador elegido a una factura*/
$(document).on("click","#asignarOpe", function(){
	var operador=document.getElementById('comboOpe').value
	var factura=document.getElementById('folioFactura').value;
	var asignar=operador+"#"+factura;
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{asignar:asignar},
    })

    .done(function(respuesta){
    	if (respuesta.includes("1")) {
    		alert("La Asignacion ha sido exitosa");
    		location.href="notificaciones.php";
    	} else {
    		alert("Error en la Asingacion");
    	}
    	//alert(respuesta);
    })

	//alert("operador-> "+operador+" factura-> "+factura);
});


/*Ordenar las solicitudes entrantes*/
$(document).on("click","#ordenarSolEnt",function() {
	var valorBuscarE=document.getElementById("comboOrdenarSolEnt").value;
	$.ajax({
        type:"POST",
        url:"FuncionesAjax.php",
        dataType:'html',
        data:{valorBuscarE:valorBuscarE},
    })
    .done(function(respuesta){
    	$('#solicitudesEn').html(respuesta);
    })
});


/*Refresh para las notificaciones*/
/*$(document).ready(function() {
	var tiempo;
	function actualizarNotificaciones(){
		var actualizarNot="actualizar las notificaciones";
		$.ajax({
		    type:"POST",
		    url:"FuncionesAjax.php",
		    dataType:'html',
		    data:{actualizarNot:actualizarNot},
		})
		.done(function(respuesta){
		  document.getElementById('sEntrantes').value="10";
		  document.getElementById('sConfirmadas').value="11";
		 
		})

	}
	tiempo= window.setInterval(function(){
  	actualizarNotificaciones();
	},3600);
});
*/
