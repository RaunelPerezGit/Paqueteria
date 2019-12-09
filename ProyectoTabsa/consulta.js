$(buscar_datos());
$(buscar_datosVehiculo());
$(buscar_datosViaje());
function buscar_datos(consulta){
	$.ajax({
		url:'buscarUser.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datos').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBusqueda', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datos(valor);
	} else {
		buscar_datos();
	}
});



//listar viajes
function buscar_datosViaje(consulta){
	$.ajax({
		url:'aniadirFactutra.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosViaje').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarViaje', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datos(valor);
	} else {
		buscar_datos();
	}
});

////////////////////////


$(document).on('click','#eliminarUser', function(){
	if (confirm('Está seguro que desea eliminar este registro?')) {
		var tel_usu=$(this).data('tel_usu');
		$.ajax({
			url:'eliminarUser.php',
			type:'POST',
			data:{tel_usu:tel_usu,},
			success: function(data){
				buscar_datos();
				alert(data);
			}
		})

		
	};
})
getPersona = function(datos){
	var nombre=datos;
	//var nombre="isaac";
	$('#nombre').val(nombre);
	//$('#apellidos').val(app);
	//$('#telefono').val(telefono);
	//$('#correo').val(correo);
  // $('#mcboOtro value(3)').prop('selected', true);
  //$('[name=mcboOtro]').val(7);
  
};

//####################################################################
//Metodos para Vehiculo
//#######################################################################


function buscar_datosVehiculo(consulta){
	$.ajax({
		url:'buscarVeh.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosVehiculo').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBusquedaVehiculo', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datosVehiculo(valor);
	} else {
		buscar_datosVehiculo();
	}
});



$(buscar_datos());
$(buscar_factura());
$(buscar_proveedor());
$(buscar_lista());
function buscar_datos(consulta){
	$.ajax({
		url:'buscarUser.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datos').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBusqueda', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datos(valor);
	} else {
		buscar_datos();
	}
});

$(document).on('click','#eliminarVehi', function(){
	if (confirm('Está seguro que desea eliminar este registro?')) {
		var placas=$(this).data('placas');
		$.ajax({
			url:'eliminarUser.php',
			type:'POST',
			data:{placas:placas,},
			success: function(data){
				buscar_datosVehiculo();
				alert(data);
			}
		})

		
	};
})




////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////BUSCAR FACTURA/////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
function buscar_factura(consulta){
	$.ajax({
		url:'buscarFactura.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosFactura').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarFactura', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_factura(valor);
	} else {
		buscar_factura();
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA BUSCAR FACTURA///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////METODOS DE PROVEEDOR///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
function buscar_proveedor(consulta){
	$.ajax({
		url:'buscarProveedor.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosProveedor').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBusquedaProveedor', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_factura(valor);
	} else {
		buscar_factura();
	}
});



$(document).on('click','#modificarProv', function(){
		var tel_prov=$(this).data('tel_prov');
		//alert(tel_prov);
		$.ajax({
			url:'buscarProveedor.php',
			type:'POST',
			dataType:'html',
			data:{tel_prov:tel_prov},
		})
		.done(function(respuesta){
		//alert(respuesta);
		var proveedor=respuesta.split(",");
		document.getElementById('nombreC1').value=proveedor[0];
		document.getElementById('contacto1').value=proveedor[1];
		document.getElementById('cargo1').value=proveedor[2];
		document.getElementById('telefonoP1').value=proveedor[3];
		document.getElementById('estadoP1').value=proveedor[4];
		document.getElementById('ciudadP1').value=proveedor[5];
		document.getElementById('cpCodP1').value=proveedor[6];
		document.getElementById('direccionP1').value=proveedor[7];
		document.getElementById('cveProv').value=proveedor[8];
		})
		.fail(function () {
			console.log('error');
		})

});

$(document).on('click','#eliminarProv', function(){
	if (confirm('Está seguro que desea eliminar este registro?')) {
		var tel_prov=$(this).data('tel_prov');
		$.ajax({
			url:'buscarVeh.php',
			type:'POST',
			data:{tel_prov:tel_prov,},
			success: function(data){
				buscar_proveedor();
				alert(data);
			}
		})

		
	};
})
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA BUSCAR PROVEEDOR//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////BUSCAR PAQUETES/////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click','#verMasFactura', function(){
		var num_fact=$(this).data('num_fact');
		$.ajax({
			url:'buscarPaquete.php',
			type:'POST',
			dataType:'html',
			data:{num_fact:num_fact},
		})
		.done(function(respuesta){
			var datos=respuesta.split("$");
			$('#tablaPaquete').html(datos[0]);
			var factura=datos[1].split('?');
			document.getElementById('factura').value=num_fact;
			document.getElementById('remitente').value=factura[3];
			document.getElementById('destinatario').value=factura[4];
			document.getElementById('monto').value=factura[1];
			document.getElementById('fecha').value=factura[0];
			document.getElementById('servicio').value=factura[2];

		})
		.fail(function () {
			console.log('error');
		})

		

});

////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA BUSCAR PAQUETES///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////MODIFICAR USUARIOS////////////////////////////////////////////

$(document).on('click','#modificarUser', function(){
		var tel_usu=$(this).data('tel_usu');
		$.ajax({
			url:'buscarUser.php',
			type:'POST',
			dataType:'html',
			data:{tel_usu:tel_usu},
		})
		.done(function(respuesta){
		//alert(respuesta);
		var usuario=respuesta.split(",");
		document.getElementById('idUser').value=usuario[0];
		document.getElementById('nombre1').value=usuario[1];
		document.getElementById('apellidos1').value=usuario[2];
		document.getElementById('telefono1').value=usuario[4];
		document.getElementById('correo1').value=usuario[3];
		document.getElementById('estado1').value=usuario[5];
		document.getElementById('ciudad1').value=usuario[6];
		document.getElementById('cpCod1').value=usuario[7];
		document.getElementById('direccion1').value=usuario[8];
		})
		.fail(function () {
			console.log('error');
		})

});

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////MODIFICAR VEHICULOS/////////////////////////////////////////////
$(document).on('click','#modificarVeh', function(){
		var placas=$(this).data('placas');
		$.ajax({
			url:'buscarVeh.php',
			type:'POST',
			dataType:'html',
			data:{placas:placas},
		})
		.done(function(respuesta){
			var vehiculo=respuesta.split(",");
			document.getElementById('idVeh').value=vehiculo[0];
			document.getElementById('modelo1').value=vehiculo[1];
			document.getElementById('marca1').value=vehiculo[2];
			document.getElementById('placas1').value=vehiculo[3];
			document.getElementById('capacidad1').value=vehiculo[4];
		})
		.fail(function () {
			console.log('error');
		})

});

////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////BUSCAR FACTURAS DISPONIBLES/////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


$(document).on('click','#verListasEnvio', function(){
	    var destino=document.getElementById("destiny").value;
	    if(destino===""){
	    	 alert("Es necesario que ingrese un destino!");
	    }else{
	   
		$.ajax({
			url:'buscarFacturaDisponible.php',
			type:'POST',
			dataType:'html',
			data:{destino:destino},
		})
		.done(function(respuesta){
			//alert(respuesta);
			$('#datosFacturaDisponible').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})
}
});



////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////TERMINA BUSCAR FACTURAS DISPONIBLES///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////AGREGAR FACTURAS A LA LISTA///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','#agregarALista', function(){
	    var num_fact=$(this).data('num_fact');
	    var fila="";
	    //alert(num_fact);
		$.ajax({
			url:'aniadirFactutra.php',
			type:'POST',
			dataType:'html',
			data:{num_fact:num_fact},
		})
		.done(function(respuesta){
			var result=respuesta.split(' ');
			//alert(respuesta);
			 fila=document.getElementById('listaFac').value;
			 fila+=result[0]+" "+result[1]+" "+result[2]+",";
			 document.getElementById('listaFac').value=fila;

			//alert(fila);
			//alert(respuesta);
			var salida="<tr> <th scope='col'>"+result[0]+"</th> <th scope='col'>"+result[1]+"</th> <th scope='col'>"+result[2]+"</th> </tr>";
			//alert(salida);
			/*var salida="<tr>
				      <th scope='col'></th>
				      <th scope='col'></th>
				      <th scope='col'></th>
				    </tr>";*/
			$("#tabla").append(salida);
		//$('#datosFacturaDisponible').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})
});


////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA AGREGAR FACTURAS//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////listas//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

function buscar_lista(consulta){
	$.ajax({
		url:'buscarlista.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datoslista').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBusquedalista', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_lista(valor);
	} else {
		buscar_lista();
	}
});
////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA listas//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////consulta listas//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','#consultarLista', function(){
	//alert('entro');
	    var origen= document.getElementById('origen').value;
	    var destino= document.getElementById('destino').value;
	    var salida=origen+","+destino;
	    alert(salida);
	    //alert(num_fact);
		$.ajax({
			url:'agregarViaje.php',
			type:'POST',
			dataType:'html',
			data:{salida:salida},
		})
		.done(function(respuesta){
			$("#modalAgregarViaje").modal("show");
			//alert(respuesta);
		})
		.fail(function () {
			console.log('error');
		})
});
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA consulta listas//////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////consulta listas//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
	$("#origen,#destino").keyup(function(){
		var selection= document.getElementById('dropDownRuta');
		length=selection.options.length;
			while(length--){
			selection.remove(length);
		}
		var origen= document.getElementById('origen').value;
	    var destino= document.getElementById('destino').value;
	    var origenDestino=origen+","+destino;
	    //alert(origenDestino);
	    //alert(num_fact);
		$.ajax({
			url:'buscarRuta.php',
			type:'POST',
			dataType:'html',
			data:{origenDestino:origenDestino},
		})
		.done(function(respuesta){
			//alert(respuesta);
			if(respuesta!=""){
				//alert(respuesta);
				//inabilitar para no poder ser elegido
				$("#dropDownRuta").append("<option >Elige una ruta</option>");

				var renglones=respuesta.split("@");

				for(var i=0; i<=renglones.length-1; i++){
					//alert(renglones[i]);
					$("#dropDownRuta").append(renglones[i]);
				}
			}else{
				//inabilitar para no poder ser elegido
				$("#dropDownRuta").append("<option>No hay elemetos para esta ruta!</option>");
			}
			//$("#modalAgregarViaje").modal("show");
			//alert(respuesta);
		})
	});
});
//validacion de los vehiculos de acuardo a las rutas

/*$(document).ready(function(){
	$("#origen,#destino").keyup(function(){

	});
});*/



$(document).ready(function(){
	$("#dropDownRuta").change(function(){
		var elegido=$(this).val();
		/*var user=<?php echo $_SESSION['admin']?>;
		alert(user);*/
		$.ajax({
			url:'ListasDestino.php',
			type:'POST',
			dataType:'html',
			data:{elegido:elegido},
		})
		.done(function(respuesta){
			$('#ListasPaquete').html(respuesta);
			//alert(respuesta);
		})
	});
});
/*$(document).on('click','#dropDownRuta', function(){
	//alert('entra al dropdownRuta');
	var origen= document.getElementById('origen').value;
	    var destino= document.getElementById('destino').value;
	    var origenDestino=origen+","+destino;
	    //alert(origenDestino);
	    //alert(num_fact);
		$.ajax({
			url:'buscarRuta.php',
			type:'POST',
			dataType:'html',
			data:{origenDestino:origenDestino},
		})
		.done(function(respuesta){
			//alert(respuesta);
			var renglones=respuesta.split("@");
			for(var i=0; i<=renglones.length-1; i++){
				//alert(renglones[i]);
				$("#dropDownRuta").append(renglones[i]);
			}
			//$("#modalAgregarViaje").modal("show");
			//alert(respuesta);
		})
	    
});
/*$(document).on('click','#dropDownRuta', function(){
		$.ajax({
			url:'buscarRuta.php',
			type:'POST',
			dataType:'html',
		})
		.fail(function () {
			console.log('error');
		})

});*/


$(document).on('click','#addListaViaje', function(){
	    var folio=$(this).data('folio_listapaq');
	    var fila="";
		$.ajax({
			url:'aniadirFactutra.php',
			type:'POST',
			dataType:'html',
			data:{folio:folio},
		})
		.done(function(respuesta){
			var result=respuesta.split(' ');
			//alert(respuesta);
			fila=document.getElementById('listaPac').value;
			 fila+=result[0]+",";
			
			 document.getElementById('listaPac').value=fila;

			//alert(fila);
			//alert(respuesta);
			var salida="<tr> <th scope='col'>"+result[0]+"</th> <th scope='col'>"+result[1]+"</th> <th scope='col'>"+result[2]+"</th> </tr>";
			//alert(salida);
			/*var salida="<tr>
				      <th scope='col'></th>
				      <th scope='col'></th>
				      <th scope='col'></th>
				    </tr>";*/
			$("#tabla2").append(salida);
		//$('#datosFacturaDisponible').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})
});
		
///////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA consulta listas//////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////BUSCAR USER PARA LA FACTURA/////////////////////////////////////
$(document).on('click','#buscarRem', function(){
	var telefono=document.getElementById('telRem').value;
	$.ajax({
			url:'buscarUser.php',
			type:'POST',
			dataType:'html',
			data:{telefono:telefono},
	})
	.done(function(respuesta){
		var res=respuesta.split('@');
		document.getElementById('nombreR').value=res[0];
		document.getElementById('apellidosR').value=res[1];
		document.getElementById('telefonoR').value=res[2];
		document.getElementById('estadoR').value=res[3];
		document.getElementById('ciudadR').value=res[4];
		document.getElementById('direccionR').value=res[5];
		document.getElementById('cpCodR').value=res[6];
			//$('#ListasPaquete').html(respuesta);
			//alert(respuesta);
	})
});

$(document).on('click','#buscarDes', function(){
	var telefono=document.getElementById('telDes').value;
	$.ajax({
			url:'buscarUser.php',
			type:'POST',
			dataType:'html',
			data:{telefono:telefono},
	})
	.done(function(respuesta){
		var res=respuesta.split('@');
		document.getElementById('nombreD').value=res[0];
		document.getElementById('apellidosD').value=res[1];
		document.getElementById('telefonoD').value=res[2];
		document.getElementById('estadoD').value=res[3];
		document.getElementById('ciudadD').value=res[4];
		document.getElementById('direccionD').value=res[5];
		document.getElementById('cpCodD').value=res[6];
			//$('#ListasPaquete').html(respuesta);
			//alert(respuesta);
	})
});
///////////////metodos para lista/////////////////////////////////////////////////
///////////////////////////////////////
$(document).on('click','#verLista', function(){
		var folio=$(this).data('folio');
		alert(folio);
		$.ajax({
			url:'buscarlista.php',
			type:'POST',
			dataType:'html',
			data:{folio:folio},
		})
		.done(function(respuesta){
			/*var datos=respuesta.split("$");
			$('#tablaPaquete').html(datos[0]);
			var factura=datos[1].split('?');
			document.getElementById('factura').value=num_fact;
			document.getElementById('remitente').value=factura[3];
			document.getElementById('destinatario').value=factura[4];
			document.getElementById('monto').value=factura[1];
			document.getElementById('fecha').value=factura[0];
			document.getElementById('servicio').value=factura[2];
			*/

		})
		.fail(function () {
			console.log('error');
		})

		

});