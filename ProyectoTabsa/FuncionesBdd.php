<?php 
	require_once("InterfazConexion.php");

	/**
	 * 
	 */
	class Funciones extends Conexion
	{
		function listaSolicitudSer()
		{
			$this->conectar();
			$salida="";
			$query="SELECT num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact from factura where status_fact='en peticion'";
			$result=$this->select($query);
			
			if ($result->num_rows>0) {
				$salida.="<h3 style='color: black; font-weight: bold;'>Solicitudes Entrantes</h3>
					<h3 style='margin-left:2%;'>Ordenar</h3>
					<select class='form-control' id='comboOrdenarSolEnt' style='display: inline-table; margin-bottom:10px; width:30%;'>
						<option value='1'>Fecha</option>
						<option value='2'>Tipo(Paquete/Documento)</option>
						<option></option>
					</select>
					<button type='button' id='ordenarSolEnt' class='btn btn-info'>Ordenar</button>
					<br>
					<table class='table table-hover table table-bordered'>
					  <thead style='background: #323232; color: white;'>
					    <tr>
					      <th scope='col'>Descripcion de la Solicitud</th>
					      <th scope='col'>Tipo</th>
					      <th scope='col'>Fecha</th>
					      <th scope='col'>Aceptar</th>
					      <th scope='col'>Rechazar</th>
					      <th scope='col'>Detalles</th>
					    </tr>
					  </thead>
					  <tbody>";
					  
				$result->data_seek(0);
				while ($fila=$result->fetch_assoc()) {
					//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
					$num=$fila['num_fact'];
					$queryFac="SELECT (SELECT ciu_dir from direccion join remitente on direccion.cve_dir=remitente.cve_dir join factura on remitente.cve_rem=factura.cve_rem where factura.num_fact=$num )as origen , (SELECT ciu_dir from direccion join  destinatario on direccion.cve_dir=destinatario.cve_dir join factura on destinatario.cve_dest=factura.cve_dest where factura.num_fact=$num)as destino";
					//echo $queryFac;
					$resultOD=$this->select($queryFac);
					$filaOD=$resultOD->fetch_assoc();
					$servicio='No. de guia '.$fila['numguia_fact'].' con fecha '.$fila['fech_fact'];
					$salida.="<tr>
					    <th>
                  			<p style='color: black;''>$servicio</p></a>
					    </th>
					  	<th scope='col'>".$fila['servicio_fact']."</th>
					  	<th scope='col'>".$fila['fech_fact']."</th>
				        <th scope='col'><button id='aceptarSer' data-num_fact='".$fila['num_fact']."' class='btn btn-success'>Aceptar Solicitud</button></th>

				        <th scope='col'><a href='#' id='rechazarSer'  data-num_fact='".$fila['num_fact']."'  class='btn btn-danger'>Rechazar Solicitud</a></th>

				         <th scope='col'><a href='#' id='verMasFactura' data-toggle='modal' data-target='#modalVerMasFactura' data-num_fact='".$fila['num_fact']."' class='btn btn-success'>Ver más</a></th>

					    </tr>";
				}
				$salida.="</tbody></table>";
			} else {
				$salida="No hay Solicitudes Entrantes :(";
			}
			echo $salida;
			$this->desconectar();
		}

		function getCountSolEnt()
		{
			$this->conectar();
			$salida="";
			$query="SELECT count(*)as count from factura where status_fact='en peticion'";
			$result=$this->select($query);
			
			if ($result) {
				$result->data_seek(0);
				$fila=$result->fetch_assoc();
				$salida=$fila['count'];
			} else {
				$salida="0";
			}
			return $salida;
			$this->desconectar();
		}

		/*Confirmacion de la peticion y envio del correo*/
		function sendEmail($factura)
		{
			$this->conectar();
			$salida="";
			$queryBuscar="SELECT nombre_rem, ap_rem, correo_rem,dir_dir,tel_rem, numguia_fact from direccion join remitente on direccion.cve_dir=remitente.cve_dir join factura on remitente.cve_rem=factura.cve_rem where factura.num_fact=$factura";
			$result=$this->select($queryBuscar);
			$result->data_seek(0);
			$fila=$result->fetch_assoc();

			$nombre=$fila['nombre_rem'];
			$apellidos=$fila['ap_rem'];
			$correo=$fila['correo_rem'];
			$telefono=$fila['tel_rem'];
			$direccion=$fila['dir_dir'];
			$numguia=$file['numguia_fact'];

			$send='name='.$nombre.'&phone='.$telefono.'&address='.$direccion.'&mail='.$correo.'&numguia='.$numguia;
			$send1=str_replace(' ','%20',$send);
			/*envio del correo para la confirmacion de la peticion*/
			$from = "ulisesvera4@gmail.com";
			$destinatario =$correo; 
			$asunto = "Peticion del Servicio"; 
			$cuerpo = ' 
			<html> 
			<head> 
			   <title>Peticion</title> 
			</head> 
			<body> 
			<h1>Solicitud Aceptada</h1> 
			<p> 
			<b>Para completar su Peticion y poder recoger su paquete/documento es necesario ir al siguieten link para confirmar sus datos...</b>
			<br>
			http://monovac.com.mx/tabsaexpress/TabsaExpressUsuario/Peticion.php/?'.$send1.'
			</p> 
			</body> 
			</html> 
			'; 

			//para el envío en formato HTML 
			$headers = "MIME-Version: 1.0\r\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
			//dirección del remitente 
			$headers .= "From:Tabsa Express <ulisesvera4@gmail.com>\r\n"; 
			$salida.=mail($destinatario,$asunto,$cuerpo,$headers);
			echo $salida."correo->".$destinatario; 
			$this->desconectar();
		}

		function listaSolicitudCon()
		{
			$this->conectar();
			$salida="";
			$query="SELECT distinct f.num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact from factura as f join recogerpaquete as rp on rp.num_fact != f.num_fact where status_fact='Confirmado'";
			$result=$this->select($query);
			
			if ($result) {
				$salida.="<h3 style='color: black; font-weight: bold;'>Solicitudes Confirmadas</h3><br><table class='table table-hover table table-bordered'>
					  <thead style='background: #323232; color: white;'>
					    <tr>
					      <th scope='col'>Descripcion de la Solicitud</th>
					      <th scope='col'>Aceptar</th>
					      <th scope='col'>Rechazar</th>
					    </tr>
					  </thead>
					  <tbody>";
					  
				$result->data_seek(0);
				while ($fila=$result->fetch_assoc()) {
					//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
					$num=$fila['num_fact'];
					$queryFac="SELECT (SELECT ciu_dir from direccion join remitente on direccion.cve_dir=remitente.cve_dir join factura on remitente.cve_rem=factura.cve_rem where factura.num_fact=$num )as origen , (SELECT ciu_dir from direccion join  destinatario on direccion.cve_dir=destinatario.cve_dir join factura on destinatario.cve_dest=factura.cve_dest where factura.num_fact=$num)as destino";
					//echo $queryFac;
					$resultOD=$this->select($queryFac);
					$filaOD=$resultOD->fetch_assoc();
					$servicio='No. de guia '.$fila['numguia_fact'].' con fecha '.$fila['fech_fact'];
					$salida.="<tr>
					    <th>
                  			<a data-toggle='collapse' data-parent='#accordion' href='#$num' >
                  			<p style='color: black;''>$servicio</p></a>
                  			
                  			<div id='$num' class='panel-collapse collapse in'>
                  				<p>Datos de la Factura</p>
                  			</div>
					    </th>
				        <th scope='col'><button id='enviarOpe' data-toggle='modal'  data-target='#aceptarSolVeh' data-num_fact='".$fila['num_fact']."' class='btn btn-info'>Enviar Operador</button></th>

				        <th scope='col'><a href='#' id='rechazarSer'  data-num_fact='".$fila['num_fact']."'  class='btn btn-danger'>Rechazar Solicitud</a></th>

					    </tr>";
				}
				$salida.="</tbody></table>";
			} else {
				$salida="No hay Solicitudes Confirmadas :(";
			}
			echo $salida;
			$this->desconectar();	
		}

		function getCountSolCon()
		{
			$this->conectar();
			$salida="";
			$query="SELECT count(num_fact) from factura where status_fact='confirmado' having num_fact!=(select num_fact from recogerpaquete)";
			$result=$this->select($query);
			
			if ($result) {
				$result->data_seek(0);
				$fila=$result->fetch_assoc();
				$salida=$fila['count'];
			} else {
				$salida="0";
			}
			return $salida;
			$this->desconectar();
		}

		function getOperadores()
		{
			$this->conectar();
			$salida="";
			$query="select cve_usu,concat(nom_usu,' ',ap_usu,' tel.',tel_usu)as nombre from usuario where tipo_usu='Conductor'";
			$result=$this->select($query);
			
			if ($result) {
				$result->data_seek(0);
				while ($fila=$result->fetch_assoc()) {
					$salida.=$fila['cve_usu'].'?'.$fila['nombre'].'#';
				}
			}

			echo $salida;
			$this->desconectar();
		}

		/*Asignacion de los operadores a las facturas que se aceptaron*/
		function asignarOperador($operador, $factura)
		{
			$this->conectar();
			$salida="";
			$queryRecogerPaquete="INSERT INTO recogerpaquete VALUES (null,now(),$operador,$factura)";
			$salida=$this->insertar($queryRecogerPaquete);
			echo $salida;
			$this->desconectar();
		}
	}

 ?>