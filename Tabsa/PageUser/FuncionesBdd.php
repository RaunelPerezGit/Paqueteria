<?php 
	require_once("Conexion.php");

	/**
	 * 
	 */
	class Funciones extends Conexion
	{

		function getTarifa()
		{
			$salidaTarifas="";
			$this->conectar();
			/*tarifas de paquetes*/
			$query1="SELECT monto_tar, fech_tar as fecha from tarifa WHERE servicio_tar='paquete' and tiposervicio_tar='expres' HAVING fecha=(select max(fech_tar)as f1 from tarifa where servicio_tar='paquete' and tiposervicio_tar='expres')";
			$result1=$this->select($query1);
			$result1->data_seek(0);
			$filaTar1=$result1->fetch_assoc();
			$salidaTarifas.=$filaTar1['monto_tar']."@";

			$query2="SELECT monto_tar, fech_tar as fecha from tarifa WHERE servicio_tar='paquete' and tiposervicio_tar='rapido' having fecha=(select max(fech_tar)as f2 from tarifa where servicio_tar='paquete' and tiposervicio_tar='rapido')";
			$result2=$this->select($query2);
			$result2->data_seek(0);
			$filaTar2=$result2->fetch_assoc();
			$salidaTarifas.=$filaTar2['monto_tar']."@";


			$query3="SELECT monto_tar, fech_tar as fecha from tarifa WHERE servicio_tar='paquete' and tiposervicio_tar='regular' having fecha=(select max(fech_tar)as f3 from tarifa where servicio_tar='paquete' and tiposervicio_tar='regular')";
			$result3=$this->select($query3);
			$result3->data_seek(0);
			$filaTar3=$result3->fetch_assoc();
			$salidaTarifas.=$filaTar3['monto_tar']."@";

			/*tarifas de documento*/
			$query11="SELECT monto_tar, fecha_tar as fecha from tarifa WHERE servicio_tar='documento' and tiposervicio_tar='expres'  having fecha=(select max(fech_tar)as f11 from tarifa where servicio_tar='documento' and tiposervicio_tar='expres')";
			$result11=$this->select($query11);
			if ($result11) {
				$result11->data_seek(0);
				$filaTar11=$result11->fetch_assoc();
				$salidaTarifas.=$filaTar11['monto_tar'];
			}
			$salidaTarifas.="@";
			$query12="SELECT monto_tar, fecha_tar as fecha from tarifa WHERE servicio_tar='documento' and tiposervicio_tar='rapido'  having fecha=(select max(fech_tar)as f12 from tarifa where servicio_tar='documento' and tiposervicio_tar='rapido')";
			$result12=$this->select($query12);
			if ($result12) {
				$result12->data_seek(0);
				$filaTar12=$result12->fetch_assoc();
				$salidaTarifas.=$filaTar12['monto_tar'];

			}
			$salidaTarifas.="@";
			$query13="SELECT monto_tar, fecha_tar as fecha from tarifa WHERE servicio_tar='documento' and tiposervicio_tar='regular'  having fecha=(select max(fech_tar)as f13 from tarifa where servicio_tar='documento' and tiposervicio_tar='regular')";
			$result13=$this->select($query13);
			if ($result13) {
				$result13->data_seek(0);
				$filaTar13=$result13->fetch_assoc();
				$salidaTarifas.=$filaTar13['monto_tar'];
			}
			$salidaTarifas.="@";

			return $salidaTarifas;
		}
		function addPeticion($datos)
		{
			$this->conectar();
			$data=json_decode(stripslashes($datos));
			$cont=count($data);
			$salida="";
			/*Iniciando la transaccion*/
			$this->transaccion();
			/*Datos generales*/
			/*Direccion del remitente*/
			$queryDirRem="INSERT into direccion values(null,'null','null',0,'".$data[3]."')";
			$salida.=$resultDirRem=$this->insertar($queryDirRem);
			$idDirRem=$this->lastId();
			/*Insercion del remitente*/
			$queryRem="INSERT into remitente values(null,'".$data[0]."','".$data[1]."','".$data[2]."','".$data[4]."',$idDirRem)";
			$salida.=$resultRem=$this->insertar($queryRem);
			$idRem=$this->lastId();
			/*Direccion del Destinatario*/
			$queryDirDes="INSERT into direccion values(null,'null','null',0,'".$data[8]."')";
			$salida.=$resultDirDes=$this->insertar($queryDirDes);
			$idDirDes=$this->lastId();
			/*Insercion del Destinatario*/
			$queryDes="INSERT into destinatario values(null,'".$data[5]."','".$data[6]."','".$data[7]."',$idDirDes)";			
			$salida.=$resultDes=$this->insertar($queryDes);
			$idDes=$this->lastId();
			/*obtencion del numero de guia*/
			$numGuia="";
			$nums = range(10, 99);
			shuffle($nums);

			$response = array();
			for($i=0;$i<5 && $i<count($nums);$i++)
			{
				$numGuia.= $nums[$i];
				array_push($response, $nums[$i]);
			}
			if ($cont<=12) {
				/*Insercion de la factura*/
				$queryFactura="INSERT into factura values(null,curdate(),curdate(),'".$numGuia."','0','0',0,'en espera','".$data[11]."','".$data[10]."','','en peticion',$idRem,$idDes,1)";
				$salida.=$resultFact=$this->insertar($queryFactura);

				$nombre="'".$data[0]."'";
				$tel="'".$data[1]."'";
				$dir="'".$data[2]."'";
				$correo="'".$data[3]."'";
				/*envio de correo*/
				/*	$from     = "ulisesvera4@gmail.com";
					$destinatario ='"'.$data[3].'"'; 
					$asunto = "Peticion del Servicio"; 
					$cuerpo = ' 
					<html> 
					<head> 
					   <title>Peticion</title> 
					</head> 
					<body> 
					<h1>Solicitud Acptada</h1> 
					<p> 
					<b>Para completar su Peticion y poder recoger su paquete/documento es necesario ir al siguieten link para confirmar sus datos...</b>
					<br>
					http://localhost/PageUser/Peticion.php/?name='.$nombre.'&phone='.$tel.'&address='.$dir.'&mail='.$correo.'
					</p> 
					</body> 
					</html> 
					'; 

					//para el envío en formato HTML 
					$headers = "MIME-Version: 1.0\r\n"; 
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
					//dirección del remitente 
					$headers .= "From:Tabsa Express <ulisesvera4@gmail.com>\r\n"; 
					mail($destinatario,$asunto,$cuerpo,$headers); 
				
				echo $cuerpo;*/
			} else {
				/*Insercion de factura*/
				$queryFactura="INSERT into factura values(null,curdate(),curdate(),'".$numGuia."','0','0',0,'en espera','".$data[11]."','".$data[10]."','','en peticion',$idRem,$idDes,1)";
				$salida.=$resultFact=$this->insertar($queryFactura);
				$idFact=$this->lastId();
				/*insercion del paquete*/
				$largo=$data[15];
				$alto=$data[16];
				$ancho=$data[17];
				$pesoF=$data[19];
				$pesoVol=$data[18];
				$valortot="'".$data[14]."'";
				$cantot="'".$data[13]."'";
				//echo $largo.' '.$alto.' '.$ancho.' '.$pesoF.' '.$pesoVol.' '.$valortot.' '.$cantot;
				/*echo $largo;
				echo $alto;
				echo $ancho;
				echo $pesoF;
				echo $pesoVol;
				echo $valortot;
				echo $cantot;*/
				$queryPaquete="INSERT into paquete values(null,$largo,$alto,$ancho,$pesoF,$pesoVol,'en peticion',$valortot,$cantot,$idFact)";
				echo $queryPaquete;

				$salida.=$this->insertar($queryPaquete);
				$idPaquete=$this->lastId();
				/*insercion de los detalles del paquete*/
				$detalles=explode(',',$data[12]);
				for ($i=0; $i <count($detalles) ; $i++) { 
					$detalle=explode('@', $detalles[$i]);
					$queryDetalle="INSERT INTO contenidopaquete values(null,'".$detalle[0]."','".$detalle[1]."','".$detalle[2]."',$idPaquete)";
					$salida.=$this->insertar($queryDetalle);
				}	
			}
			/*evaluacion de todas las inserciones*/
			$encontrar=strpos('0',$salida);
			if ($encontrar===false) {
				echo "1"."@".$numGuia;
				$this->commit();
			} else {
				echo "0";
				$this->rollback();
			}
			$this->desconectar();
		}


		function actualizarFactura($numeroGuia){
			$this->conectar();
			$query="UPDATE factura SET status_fact = \"Confirmado\"  WHERE numguia_fact='".$numeroGuia."'";
			$result=$this->update($query);
			if (!$result) {
				echo "Error al actualizar";
				exit();
			}else{	
				echo "actualizado con éxito";
			}
			$this->desconectar();
		}
	}

 ?>