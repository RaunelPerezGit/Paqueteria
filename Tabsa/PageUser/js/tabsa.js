
$(document).ready(function(){
        var myLatLng = {lat:19.4317717, lng: -100.3572851};
        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('mapa'), {
              center: myLatLng,
              zoom: 15
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
              map: map,
              position: myLatLng,
              title: 'Hello World!'
         });
    
/*
var divMapa=document.getElementById('mapa');
navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
function fn_mal(){}
    function fn_ok(rta){
        var lat= 19.4317717;
        var lon=-100.3572851;
        var gLatLon=new google.maps.LatLng(lat,lon);
        //dibujando el mapa
        var objConfig={
            zoom:17,
            center:gLatLon
        };
        var gMapa=new google.maps.Map(divMapa, objConfig);
        var punto1 = {lat: 19.4317717, lng: -100.3572851};
        var marker = new google.maps.Marker({
        map: gMapa,
        position: punto1,
       title: 'A'
       });
    }//instancia de un mapa para dibujar 
    */       
});


$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})


// Select all tabs
$('.nav-tabs a').click(function(){
    $(this).tab('show');
})

// Select tab by name
$('.nav-tabs a[href="#home"]').tab('show')

// Select first tab
$('.nav-tabs a:first').tab('show') 

// Select last tab
$('.nav-tabs a:last').tab('show') 

// Select fourth tab (zero-based)
$('.nav-tabs li:eq(3) a').tab('show')

//funciones para el modal 
var salida="";
var x=1;
var d="";
function calcular(){
            var largo=document.getElementById("largo").value;
            var alto=document.getElementById("alto").value;
            var ancho=document.getElementById("ancho").value;
            peso=((largo*alto*ancho)/500);
            document.getElementById("peso").value=peso;
        }
$(document).on('click','#agregar', function(){
    var articulo=document.getElementById("art").value;
    var cantidad=document.getElementById("cant").value;
    var valor=document.getElementById("val").value;
    var salida=document.getElementById('salida').value;
    if (articulo!="" && cantidad!="" && valor!="") {
        d+= '<tr>'+
        '<td>'+x+'</td>'+
        '<td>'+articulo+'</td>'+
        '<td>'+cantidad+'</td>'+
        '<td>'+valor+'</td>'+
        '</tr>';

        $("#tabla").append(d);
        salida+=articulo+"@"+cantidad+" @"+valor+",";
        document.cookie ='variable='+salida;
        x=x+1;
        d="";
        document.getElementById("salida").value=salida;
        document.getElementById("art").value="";
        document.getElementById("cant").value="";
        document.getElementById("val").value="";
        $("#tabla").append(d);
        totalCant();
        totalVal(); 
    } else {
        alert("No puedes dejar campos vacios");
    }
                                    
});

function totalCant(){
    cantidad=document.getElementById("salida").value;
    var total=0;
    res=cantidad.split(",");
    for (var i = 0; i < res.length-1; i+=1) {
        var res1=res[i].split("@");
        //alert(res1[1])
        var x=parseInt(res1[1]);
        //alert("x->"+x);
        total=total+x;
    }
    document.getElementById("canT").value=total;
}

function totalVal(){
    cantidad=document.getElementById("salida").value;
    //alert(cantidad);
    var total=0;
    res=cantidad.split(",");
    for (var i = 0; i < res.length-1; i+=1) {
        var res1=res[i].split("@");
        var x=parseInt(res1[2]);
        total=total+x;
    }
    document.getElementById("valT").value=total;
}
/*
function calcularTotal(){
    importe=document.getElementById("importe").value;
    seguro=document.getElementById("seguro").value;
    adicional=document.getElementById("adicional").value;
    descuento=document.getElementById("descuento").value;
    var totalFact=parseInt(importe)+parseInt(seguro)+parseInt(adicional)-parseInt(descuento);
    document.getElementById("totalFact").value=totalFact;
}*/

/*-----------------add peticion------------------*/
$(document).on("click","#enviar", function () {
    /*Datos del Remitente*/
    var nombre=document.getElementById('nombre').value;
    var apR=document.getElementById('apR').value;
    var telefono=document.getElementById('telefono').value;
    var direccion=document.getElementById('direccion').value;
    var email=document.getElementById('email').value;
    /*Datos del Destinatario*/
    var nombreD=document.getElementById('nombreD').value;
    var apD=document.getElementById('apD').value;
    var telefonoD=document.getElementById('telefonoD').value;
    var direccionD=document.getElementById('direccionD').value;
    var emailD=document.getElementById('emailD').value;
    /*Datos generales del paquete*/
    var servicio=document.getElementById('servicio').value;
    var tipo="";
    var salida;
   
   if ($("#doc").is(':checked')) {
        tipo="documento";
        var datos=[nombre,apR,telefono,direccion,email,nombreD,apD,telefonoD,direccionD,emailD,servicio,tipo];
        var jsonString=JSON.stringify(datos);
       $.ajax({
            type:"POST",
            url:"FuncionesAjax.php",
            data:{data:jsonString},

       })
       .done(function(respuesta){
            var salida=respuesta.split("@");
            //alert(respuesta);
           if (salida[0].includes("1")) {
                alert("La peticion ha sido enviada, su num. de guia es "+salida[1]);
                location.href="index.php";
           } else {
                alert("Error al enviar la peticion");
           }
        })

   } else {
        tipo="paquete";
        salida=document.getElementById('salida').value;
        if (salida!="") {
            var cantidad=document.getElementById('canT').value;
            var valor=document.getElementById('valT').value;
            var largo=document.getElementById('largo').value;
            var alto=document.getElementById('alto').value;
            var ancho=document.getElementById('ancho').value;
            var pesoV=document.getElementById('peso').value;
            var pesoF=document.getElementById('peso1').value;
            //alert(cantidad+" "+valor);
            var datos=[nombre,apR,telefono,direccion,email,nombreD,apD,telefonoD,direccionD,emailD,servicio,tipo,salida,cantidad,valor,largo,alto,ancho,pesoV,pesoF];
                      //  0       1   2       3           4   5       6   7           8           9       10     11   12     13   14  15  16      17  18      19 
            var jsonString=JSON.stringify(datos);
            $.ajax({
                type:"POST",
                url:"FuncionesAjax.php",
                data:{data:jsonString},

            })
            .done(function(respuesta){
                var salida=respuesta.split("@");
                //alert(respuesta);
                if (salida[0].includes("1")) {
                    alert("La peticion ha sido enviada, su num. de guia es "+salida[1]);
                    location.href="index.php";
                } else {
                    alert("Error al enviar la peticion");
                }
            })
        } else {
            alert("debes instroducir los datos del paquete");
        }
        
   }
   
});

$(document).on('click','#aceptarG', function(){
    var guia = document.getElementById('nGuia').innerHTML;
    $.ajax({
        url:'actualizarFact.php',
        type:'POST',
        dataType:'html',
        data:{guia:guia},
        success: function(data){
            location.replace("verificar.php");
        }
    })

    .done(function(respuesta){
        console.log("done");
    })
    .fail(function(){
        console.log("fail");
    })  
});