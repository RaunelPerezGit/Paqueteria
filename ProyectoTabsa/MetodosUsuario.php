<?php
require_once("InterfazConexion.php");
/**
* 
*/
class MetodosUsuario extends Conexion
{
	
	function registrarUsuario($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->fetch_assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{
			session_start();
			$idSuc=$_SESSION['idSuc'];
			$this->transaccion();
			$id=0;
			//buscamos si ya existe una direccion general 
			/*$queryBuscarDir="select cve_dir from direccion where est_dir='".$datos[6]."' and ciu_dir='".$datos[7]."'";
			$result=$this->select($queryBuscarDir);
			if ($result->num_rows>0) {
				$fila=$result->fetch_assoc();
				$claveDir=$fila['cve_dir'];
				$queryDirEsp="INSERT into direccionespecifica values(null,'".$datos[8]."','".$datos[9]."',$claveDir);";
				$resultDir=$this->insertar($queryDirEsp);
				echo "if".$queryDirEsp;
				$id=$this->lastId();
			}else{
				$queryDir="INSERT into direccion values(null,'".$datos[6]."','".$datos[7]."');";
				$result1=$this->insertar($queryDir);
				$id=$this->lastId();
				$queryDirEsp="INSERT into direccionespecifica values(null,'".$datos[8]."','".$datos[9]."',$id);";
				$resultDir=$this->insertar($queryDirEsp);
				$id=$this->lastId();
				echo $queryDir;
				echo $queryDirEsp;
			}*/

			///////////////////////
			$query1="INSERT into direccion values(null,'".$datos[6]."','".$datos[7]."','".$datos[8]."','".$datos[9]."');";
			$result1=$this->insertar($query1);
			$id=$this->lastId();
			if ($datos[10]=='conductor') {
				$query2="INSERT into usuario values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."','Conductor',$id,$idSuc);";

			} else {
				$query2="INSERT into usuario values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."','".$datos[10]."',$id,$idSuc);";
				echo "user"." ".$query2;
			}
			$result2=$this->insertar($query2);
			echo $resultDir." ".$result2;
			if ($result1==1 && $result2==1) {
				$this->commit();
				echo "<script>
					alert('Registrado con éxito!');
				 </script>"	;

			} else {
				$this->rollback();
				echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
			}
			
			
			//header('Location:../registroUsuario.php');
			$this->desconectar();
		
	}


	function listarUsuario(){
		$this->conectar();
		$salida="";
		$query="SELECT nom_usu,ap_usu,correo_usu,tel_usu,tipo_usu,calidad_usu from usuario";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT nom_usu,ap_usu,correo_usu,tel_usu,tipo_usu,calidad_usu from usuario WHERE nom_usu LIKE '%".$q."%' OR tel_usu LIKE '%".$q."%' OR correo_usu LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background: #323232; color: white;'>
				    <tr>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Apellidos</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>Teléfono</th>
				      <th scope='col'>Tipo de usuario</th>
				       <th scope='col'>Tipo de usuario</th>
				       <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$salida.="<tr>
				      <th scope='col'><span class='fa fa-user' aria-hidden='true'> </span> ".$fila['nom_usu']."</th>
				      <th scope='col'>".$fila['ap_usu']."</th>
				      <th scope='col'>".$fila['correo_usu']."</th>
				      <th scope='col'>".$fila['tel_usu']."</th>
				      <th scope='col'>".$fila['tipo_usu']."</th>
				      <th scope='col'>".$fila['calidad_usu']."</th>
				      <th scope='col'><button id='eliminarUser' data-tel_usu='".$fila['tel_usu']."' class='btn btn-danger'>Eliminar</button></th>
				      <th scope='col'><a href='#' id='modificarUser' data-toggle='modal' data-target='#modalModUser' data-tel_usu='".$fila['tel_usu']."'  class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}
	function eliminarUsuario($telefono){
		$this->conectar();
		$query="DELETE FROM usuario WHERE tel_usu='".$telefono."'";
		$result=$this->eliminar($query);
		if (!$result) {
			echo "Error al eliminar";
			exit();
		}else{	
			
			echo "Eliminado con éxito";
		}
		$this->desconectar();
	}
	function validarUsuario($datos){
		$this->conectar();
		session_start();
		$pass=sha1($datos[1]);
		$query="select cve_adm, sucursal.cve_suc from administrador join sucursal on administrador.cve_suc=sucursal.cve_suc  where nom_adm='".$datos[0]."' and contra_adm='".$pass."'";
		$query2="select cve_usu, sucursal.cve_suc from usuario join sucursal on usuario.cve_suc=sucursal.cve_suc where nom_usu='".$datos[0]."' and pass_usu='".$pass."'";

		$result=$this->select($query);
		$result2=$this->select($query2);
		if($result->num_rows>0){
			$fila=$result->fetch_assoc();
			$_SESSION["admin"]=$datos[0];
			$_SESSION["idAdm"]=$fila['cve_adm'];
			$_SESSION['idSuc']=$fila['cve_suc'];
			return 1;
		} else{
			if ($result2->num_rows>0) {
				$fila2=$result2->fetch_assoc();
				$_SESSION["usuario"]=$datos[0];
				$_SESSION["idUser"]=$fila['cve_usu'];
				$_SESSION['idSuc']=$fila['cve_suc'];
				return 2;
			}else{
				//$query="insert into administrador values (1,'".$datos[0]."','".$pass."',1)";
				//echo $query;
				//$result1=$this->insertar($query);
				return 0;
				
			}
		}
	}
	function buscarUser($telefono){
		$this->conectar();
		$query="SELECT cve_usu, nom_usu,ap_usu,correo_usu,tel_usu,est_dir,ciu_dir,cpcod_dir,dir_dir from usuario join direccion on usuario.cve_dir=direccion.cve_dir where tel_usu='".$telefono."'";
		
		$result=$this->select($query);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$usuario=$fila['cve_usu'].",".$fila['nom_usu'].",".$fila['ap_usu'].",".$fila['correo_usu'].",".$fila['tel_usu'].",".$fila['est_dir'].",".$fila['ciu_dir'].",".$fila['cpcod_dir'].",".$fila['dir_dir'];
		echo $usuario;
		return $result;
		$this->desconectar();
	}

	function modificarUser($datos){
		$this->conectar();
		$cve="select cve_dir from usuario WHERE cve_usu=$datos[8]";
		$result3=$this->select($cve);
		$result3->data_seek(0);
		$fila=$result3->fetch_assoc();
		$dir=$fila['cve_dir'];
		$query="UPDATE usuario set nom_usu='".$datos[0]."',ap_usu='".$datos[1]."', correo_usu='".$datos[2]."',tel_usu='".$datos[3]."' WHERE cve_usu=$datos[8]";
		$queriDir="UPDATE direccion set est_dir='".$datos[4]."', ciu_dir='".$datos[5]."', cpcod_dir='".$datos[6]."', dir_dir='".$datos[7]."' WHERE cve_dir=$dir " ;
		$result1=$this->update($query);
		$result2=$this->update($queriDir);
		if ($result1==1 && $result2==1) {
			echo "<script>
					alert('Registro actualizado con éxito!');
				 </script>"	;
			//self::listarUsuario();
		} else {
			echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
		}
		

		
	}


	###########################################################################################################################METODOS PARA VEHICULO############################################################
	function registrarVehiculo($datos){
		$this->conectar();
		$query="INSERT into vehiculo values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."',$datos[3]);";
		$result=$this->insertar($query);
		if ($result==1) {
			echo "<script>
					alert('Registrado con éxito!');
				 </script>"	;
		} else {
			echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
		}
		
		$this->desconectar();
	}

	function listarVehiculo(){
		$this->conectar();
		$salida="";
		$query="SELECT modelo_vehi,marca_vehi,placas,capacidadvolu_vehi from vehiculo";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT modelo_vehi,marca_vehi,placas,capacidadvolu_vehi from vehiculo WHERE modelo_vehi LIKE '%".$q."%' OR marca_vehi LIKE '%".$q."%' OR placas LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background:#323232; color:white;'>
				    <tr>
				      <th scope='col'>Modelo</th>
				      <th scope='col'>Marca</th>
				      <th scope='col'>Placas</th>
				      <th scope='col'>Capacidad volumétrica</th>
				       <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$salida.="<tr>
				      <th scope='col'>".$fila['modelo_vehi']."</th>
				      <th scope='col'>".$fila['marca_vehi']."</th>
				      <th scope='col'>".$fila['placas']."</th>
				      <th scope='col'>".$fila['capacidadvolu_vehi']."</th>
				      <th scope='col'><button id='eliminarVehi' data-placas='".$fila['placas']."' class='btn btn-danger' >Eliminar</button></th>
				      <th scope='col'><a href='#' id='modificarVeh' data-toggle='modal' data-target='#modalEditVehiculo' data-placas='".$fila['placas']."'  class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}

	function eliminarVehiculo($placas){
		$this->conectar();
		$query="DELETE FROM vehiculo WHERE placas='".$placas."'";
		$result=$this->eliminar($query);
		if (!$result) {
			echo "Error al eliminar!";
			exit();
		}else{	
			
			echo "Registro eliminado con éxito.";
		}
		$this->desconectar();
	}




	function buscarVeh($placas){
		$this->conectar();
		$query="SELECT cve_vehi ,modelo_vehi ,marca_vehi ,placas ,capacidadvolu_vehi  from vehiculo WHERE placas='".$placas."'";
		
		$result=$this->select($query);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$vehiculo=$fila['cve_vehi'].",".$fila['modelo_vehi'].",".$fila['marca_vehi'].",".$fila['placas'].",".$fila['capacidadvolu_vehi'];
		echo $vehiculo;
		return $result;
		$this->desconectar();
	}


	function modificarVehiculo($datos){
		$this->conectar();
		$cve=$datos[0];
		$query="update vehiculo set modelo_vehi='".$datos[1]."', marca_vehi='".$datos[2]."', placas='".$datos[3]."',capacidadvolu_vehi='".$datos[4]."' WHERE  cve_vehi=$cve";
		$result=$this->update($query);
		if ($result==1) {
			echo "<script>
					alert('Registro actualizado con éxito!!');
				 </script>"	;
			//self::listarUsuario();
		} else {
			echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////LISTADO DE FACTURAS/////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////
	function getUserFact($telefono){
		$this->conectar();
		$salida="";
		$query="select nom_usu,ap_usu,tel_usu,est_dir,ciu_dir,dir_dir,cpcod_dir from usuario join direccion on usuario.cve_dir=direccion.cve_dir WHERE tel_usu='".$telefono."' and tipo_usu='Cliente'";
		$result=$this->select($query);
		$fila=$result->fetch_assoc();
		$salida.=$fila['nom_usu']."@".$fila['ap_usu']."@".$fila['tel_usu']."@".$fila['est_dir']."@".$fila['ciu_dir']."@".$fila['dir_dir']."@".$fila['cpcod_dir'];
		echo $salida;
		$this->desconectar();
	}

	function agregarFactura($datosRemitente,$datosDestinatario,$datosFactura,$datosPaquete){
			$this->conectar();
			$this->transaccion();
				$numGuia="";
				$nums = range(10, 99);
				shuffle($nums);
	
				$response = array();
				for($i=0;$i<5 && $i<count($nums);$i++)
				{
					$numGuia.= $nums[$i];
					array_push($response, $nums[$i]);
				}
				//echo $numGuia;
			session_start();
			$idSuc=$_SESSION['idSuc'];
			$queryDirRem="INSERT into direccion values(null,'".$datosRemitente[3]."','".$datosRemitente[4]."','".$datosRemitente[6]."','".$datosRemitente[5]."')";
			//echo $queryDirRem;
			$resultDirRem=$this->insertar($queryDirRem);
			$idDirRem=$this->lastId();
			$queryRem="INSERT into remitente values(null,'".$datosRemitente[0]."','".$datosRemitente[1]."','".$datosRemitente[2]."','null',$idDirRem)";
			$resultRem=$this->insertar($queryRem);
			$idRem=$this->lastId();
			$queryDirDes="INSERT into direccion values(null,'".$datosDestinatario[3]."','".$datosDestinatario[4]."','".$datosDestinatario[6]."','".$datosDestinatario[5]."')";
			//echo $queryDirDes;
			$resultDirDes=$this->insertar($queryDirDes);
			$idDirDes=$this->lastId();
			$queryDes="INSERT into destinatario values(null,'".$datosDestinatario[0]."','".$datosDestinatario[1]."','".$datosDestinatario[2]."',$idDirDes)";			
			$resultDes=$this->insertar($queryDes);
			$idDes=$this->lastId();
			$tipo=$datosFactura[3];
			$tipo1='Documento';
			echo $tipo;
			if (strcmp($tipo, $tipo1) === 0 ) {
				$total=$datosFactura[2];
				$queryFactura="INSERT into factura values(null,curdate(),'".str_to_date($datosFactura[6], '%d/%m/%Y')."','".$numGuia."','".$datosFactura[0]."','".$datosFactura[1]."',$total,'en espera','".$datosFactura[3]."','".$datosFactura[4]."','".$datosFactura[5]."','en espera',$idRem,$idDes,$idSuc)";
				$resultFact=$this->insertar($queryFactura);
				if ($resultDirRem==1 && $resultRem==1 && $resultDirDes==1 && $resultDes==1 && $resultFact==1) {
					$this->commit();
					echo "<script> alert('Registrado con éxito!');</script>";
					} else {
					$this->rollback();
					echo "<script> alert('Error al registrar la factura!');</script>";
					}
			} else {
				$total=$datosFactura[2];
				$queryFactura="INSERT into factura values(null,curdate(),'".$datosFactura[6]."','".$numGuia."','".$datosFactura[0]."','".$datosFactura[1]."',$total,'en espera','".$datosFactura[3]."','".$datosFactura[4]."','".$datosFactura[5]."','en espera',$idRem,$idDes,$idSuc)";
				//echo $queryFactura;
				$resultFact=$this->insertar($queryFactura);
				//echo "antes de paquete".$resultFact;
				$idFact=$this->lastId();
				//echo "id factura=".$idFact;
				$largo=$datosPaquete[0];
				$alto=$datosPaquete[1];
				$ancho=$datosPaquete[2];
				$pesoF=$datosPaquete[3];
				$pesoVol=$datosPaquete[4];
				$valortot= $datosPaquete[5];
				$cantot=$datosPaquete[6];
				$queryPaquete="INSERT into paquete values(null,$largo,$alto,$ancho,$pesoF,$pesoVol,'en espera',$valortot,$cantot,$idFact)";
				//echo $queryPaquete."el que sigue";
				$resultPaquete=$this->insertar($queryPaquete);
				$idPaquete=$this->lastId();
				//echo "id paquete=".$idPaquete;
				$cantidad=$datosPaquete[7];
				//echo $cantidad;
				//alert(cantidad);
				$resultRenglon=0;
				$res=explode(",", $cantidad);
				for($i=0;$i<count($res)-1;$i++){ 
    				$res1=explode("@", $res[$i]);
    				$articulo=$res1[0];
    				$cant=intval($res1[1]);
    				$valor=floatval($res1[2]);
    				$queryRenglon="INSERT into contenidopaquete values(null,'".$articulo."',$cant,$valor,$idPaquete)";
    				//echo $queryRenglon;
    				$resultRenglon=$this->insertar($queryRenglon);
    				//echo "for".$resultRenglon ;
				}
				echo $resultDirRem." ".$resultRem." ".$resultDirDes." ".$resultFact."" .$resultPaquete." ".$resultRenglon;
				echo $resultRem;
				echo $resultDirDes;
				echo $resultDes;
				echo $resultFact;
				echo $resultPaquete;
				echo $resultRenglon;
				$valor = $resultDirRem." ".$resultRem." ".$resultDirDes." ".$resultFact."" .$resultPaquete." ".$resultRenglon;
				
				if ($resultDirRem==1 && $resultRem==1 && $resultDirDes==1 && $resultDes==1 && $resultFact==1 && $resultPaquete==1 && $resultRenglon==1) {
					$this->commit();
					echo "<script> alert('Registrado con éxito!');</script>";
					} else {
					$this->rollback();
					echo "<script> alert('Error al registrar la factura!$valor $queryDes');</script>";
					}
			}

	}


		function listarFactura(){
		$this->conectar();
		$salida="";
		$query="SELECT num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact  from factura";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact from factura WHERE num_fact LIKE '%".$q."%' OR numguia_fact LIKE '%".$q."%' OR fech_fact LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background: #323232; color: white;'>
				    <tr>
				      <th scope='col'>Número</th>
				      <th scope='col'>Fecha</th>
				      <th scope='col'>Número guia</th>
				      <th scope='col'>Monto</th>
				      <th scope='col'>Estado pago</th>
				      <th scope='col'>Servicio</th>
				      <th scope='col'>Tipo servicio</th>
				      <th scope='col'>Origen/destino</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Ver más</th>
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
				$salida.="<tr>
				      <th scope='col'>".$fila['num_fact']."</th>
				      <th scope='col'>".$fila['fech_fact']."</th>
				      <th scope='col'>".$fila['numguia_fact']."</th>
				      <th scope='col'>".$fila['monto_fact']."</th>
				      <th scope='col'>".$fila['statuspago_fact']."</th>
				      <th scope='col'>".$fila['servicio_fact']."</th>
				      <th scope='col'>".$fila['tiposer_fact']."</th>
				      <th scope='col'>".$filaOD['origen']."/".$filaOD['destino']."</th>
				      <th scope='col'><button id='eliminarFactura' data-tel_usu='".$fila['num_fact']."' class='btn btn-danger'>Eliminar</button></th>

				      <th scope='col'><a href='#' id='verMasFactura' data-toggle='modal' data-target='#modalVerMasFactura' data-num_fact='".$fila['num_fact']."' onClick=getPersona('".$fila['num_fact']."'); class='btn btn-success'>Ver más</a></th>

				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos de factura :(";
		}
		echo $salida;
		$this->desconectar();
	}

////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////TERMINA LISTADO DE FACTURAS//////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////



		function listarPaquete($factura){
		$this->conectar();
		$salida1="";
		//$query="SELECT cve_paq, largo_paq, alto_paq, ancho_paq, pes_paq from paquete WHERE num_fact='".$factura."'";
		$query="SELECT cve_paq, largo_paq, alto_paq, ancho_paq, pes_paq,fech_fact,monto_fact,servicio_fact,(SELECT concat(nombre_rem,' ',ap_rem)as nombreRem from direccion join remitente on direccion.cve_dir=remitente.cve_dir join factura on remitente.cve_rem=factura.cve_rem where factura.num_fact='".$factura."')as origen, (SELECT concat(nombre_dest,' ',ap_dest)as nombreDes from direccion join destinatario on direccion.cve_dir=destinatario.cve_dir join factura on destinatario.cve_dest=factura.cve_dest where factura.num_fact='".$factura."')as destino from paquete join factura on paquete.num_fact=factura.num_fact WHERE factura.num_fact='".$factura."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida1.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Número del paquete</th>
				      <th scope='col'>Largo</th>
				      <th scope='col'>Alto</th>
				      <th scope='col'>Ancho</th>
				      <th scope='col'>Peso</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			$filaPaq=$result->fetch_assoc();
				$salida1.="<tr>
				      <th scope='col'>".$filaPaq['cve_paq']."</th>
				      <th scope='col'>".$filaPaq['largo_paq']."</th>
				      <th scope='col'>".$filaPaq['alto_paq']."</th>
				      <th scope='col'>".$filaPaq['ancho_paq']."</th>
				      <th scope='col'>".$filaPaq['pes_paq']."</th>
				    </tr>";
			
			$salida1.="</tbody></table>";
			$salida1=$salida1."$".$filaPaq['fech_fact']."?".$filaPaq['monto_fact']."?".$filaPaq['servicio_fact']."?".$filaPaq['origen']."?".$filaPaq['destino'];
		} else {
			$salida1="No hay datos :(";
		}
		echo $salida1;
		$this->desconectar();
	}



////////////////////////////////////////////////////////////////////////////////////77
	function registrarTarifa($datos)
	{
		$this->conectar();
			$query1="INSERT into tarifa values (null,now(),'".$datos[0]."','".$datos[1]."','".$datos[2]."');";
			echo $query1;
			$result=$this->insertar($query1);
			header('location:inicio.php');
			$this->desconectar();
			
		//}
		
	}




	function verTarifa(){
		$this->conectar();
		$salida="";
		$querymax1="select max(fech_tar)as f1 from tarifa where servicio_tar='Paquete' and tiposervicio_tar='Express'";
		$resultm1=$this->select($querymax1);
		$resultm1->data_seek(0);
		$filam1=$resultm1->fetch_assoc();
		$fecha1=$filam1['f1'];

		$querymax2="select max(fech_tar)as f2 from tarifa where servicio_tar='Paquete' and tiposervicio_tar='Rápido'";
		$resultm2=$this->select($querymax2);
		$resultm2->data_seek(0);
		$filam2=$resultm2->fetch_assoc();
		$fecha2=$filam2['f2'];

		$querymax3="select max(fech_tar)as f3 from tarifa where servicio_tar='Paquete' and tiposervicio_tar='Regular'";
		$resultm3=$this->select($querymax3);
		$resultm3->data_seek(0);
		$filam3=$resultm3->fetch_assoc();
		$fecha3=$filam3['f3'];


		$querymax11="select max(fech_tar)as f11 from tarifa where servicio_tar='Documento' and tiposervicio_tar='Express'";
		$resultm11=$this->select($querymax11);
		$resultm11->data_seek(0);
		$filam11=$resultm11->fetch_assoc();
		$fecha11=$filam11['f11'];

		$querymax12="select max(fech_tar)as f12 from tarifa where servicio_tar='Documento' and tiposervicio_tar='Rápido'";
		$resultm12=$this->select($querymax12);
		$resultm12->data_seek(0);
		$filam12=$resultm12->fetch_assoc();
		$fecha12=$filam12['f12'];

		$querymax13="select max(fech_tar)as f13 from tarifa where servicio_tar='Documento' and tiposervicio_tar='Regular'";
		$resultm13=$this->select($querymax13);
		$resultm13->data_seek(0);
		$filam13=$resultm13->fetch_assoc();
		$fecha13=$filam13['f13'];


		$query1="SELECT monto_tar from tarifa WHERE servicio_tar='Paquete' and tiposervicio_tar='Express' and fech_tar='".$fecha1."' ";
		$result1=$this->select($query1);
		$result1->data_seek(0);
		$filaTar1=$result1->fetch_assoc();

		$query2="SELECT monto_tar from tarifa WHERE servicio_tar='Paquete' and tiposervicio_tar='Rápido' and fech_tar='".$fecha2."' ";
		$result2=$this->select($query2);
		$result2->data_seek(0);
		$filaTar2=$result2->fetch_assoc();

		$query3="SELECT monto_tar from tarifa WHERE servicio_tar='Paquete' and tiposervicio_tar='Regular' and fech_tar='".$fecha3."' ";
		$result3=$this->select($query3);
		$result3->data_seek(0);
		$filaTar3=$result3->fetch_assoc();



		$query11="SELECT monto_tar from tarifa WHERE servicio_tar='Documento' and tiposervicio_tar='Express' and fech_tar='".$fecha11."' ";
		$result11=$this->select($query11);
		$result11->data_seek(0);
		$filaTar11=$result11->fetch_assoc();

		$query12="SELECT monto_tar from tarifa WHERE servicio_tar='Documento' and tiposervicio_tar='Rápido' and fech_tar='".$fecha12."' ";
		$result12=$this->select($query12);
		$result12->data_seek(0);
		$filaTar12=$result12->fetch_assoc();

		$query13="SELECT monto_tar from tarifa WHERE servicio_tar='Documento' and tiposervicio_tar='Regular' and fech_tar='".$fecha13."' ";
		$result13=$this->select($query13);
		$result13->data_seek(0);
		$filaTar13=$result13->fetch_assoc();


		if ($result1->num_rows>0 || $result2->num_rows>0 || $result3->num_rows>0  || $result11->num_rows>0 || $result12->num_rows>0 || $result13->num_rows>0) {

			$salida.="<div class='form-group col-md-12 mb-3' style='padding-top: 70px;'>
	<div class='form-group col-sm-offset-2 col-md-3 mb-3'>
		<div class='panel panel-default' style='border-radius: 5px;'>
		  <div class='panel-heading' style='background: #3DC7BE; border-radius: 3px;'>
		    <h3 class='panel-title' style='font-size: 30px; color: white; text-align: center; font-family: inherit;'>PAQUETE</h3>
		  </div>
		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar1['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Express.</h4>
			  	</div>
		  	</div>
		  </div>

		  <div class='panel-body' style='text-align: center; background: #616161; color: white; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-1 mb-3'>
			  		<h1>".$filaTar2['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-sm-offset-2 col-md-7 mb-3' style='padding-top: 20px;'>
			  		<h4>Rapido</h4>
			  	</div>
		  	</div>
		  </div>


		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar3['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Regular</h4>
			  	</div>
		  	</div>
		  </div>

		</div>
	</div>


		<div class='form-group col-sm-offset-2 col-md-3 mb-3'>
		<div class='panel panel-default' style='border-radius: 5px;'>
		  <div class='panel-heading' style='background: #FCAC0C; border-radius: 3px;'>
		    <h3 class='panel-title' style='font-size: 30px; color: white; text-align: center; font-family: inherit;'>DOCUMENTO</h3>
		  </div>
		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar11['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Express</h4>
			  	</div>
		  	</div>
		  </div>

		  <div class='panel-body' style='text-align: center; background: #616161; color: white; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-1 mb-3'>
			  		<h1>".$filaTar12['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-sm-offset-2 col-md-7 mb-3' style='padding-top: 20px;'>
			  		<h4>Rapido.</h4>
			  	</div>
		  	</div>
		  </div>

		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar13['monto_tar']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Regular</h4>
			  	</div>
		  	</div>
		  </div>
		</div>
	</div>

</div>";
		} else {
			$salida="No hay datos de factura :(";
		}
		echo $salida;
		$this->desconectar();
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////77
	//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////PAQUETES PARA LISTAS DE ENVIO/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

		function facturasParaListaEnvio($destino){
		$this->conectar();
		$salida="";
		$query="SELECT num_fact, fech_fact, numguia_fact , monto_fact, statuspago_fact, servicio_fact, tiposer_fact from factura join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir where statuspago_fact='en espera' and ciu_dir='".$destino."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead '>
				    <tr>
				      <th scope='col'>Número</th>
				      <th scope='col'>Fecha</th>
				      <th scope='col'>Servicio</th>
				      <th scope='col'>Tipo servicio</th>
				      <th scope='col'>Agregar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);

				while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				if($fila['tiposer_fact']==="Express"){
				$salida.="<tr class='danger'>
				      <th scope='col'>".$fila['num_fact']."</th>
				      <th scope='col'>".$fila['fech_fact']."</th>
				      <th scope='col'>".$fila['servicio_fact']."</th>
				      <th scope='col'>".$fila['tiposer_fact']."</th>

				      <th scope='col'><a href='#' id='agregarALista' data-num_fact='".$fila['num_fact']."'  onClick=getPersona('".$fila['num_fact']."'); class='btn btn-success'>Agregar</a></th>

				    </tr>";
				}

				if($fila['tiposer_fact']==="regular"){
				$salida.="<tr class='success'>
				      <th scope='col'>".$fila['num_fact']."</th>
				      <th scope='col'>".$fila['fech_fact']."</th>
				      <th scope='col'>".$fila['servicio_fact']."</th>
				      <th scope='col'>".$fila['tiposer_fact']."</th>

				      <th scope='col'><a href='#' id='agregarALista' data-num_fact='".$fila['num_fact']."'  onClick=getPersona('".$fila['num_fact']."'); class='btn btn-success'>Agregar</a></th>

				    </tr>";
				}
				if($fila['tiposer_fact']==="rapido"){
				$salida.="<tr style='background:red;' >
				      <th scope='col'>".$fila['num_fact']."</th>
				      <th scope='col'>".$fila['fech_fact']."</th>
				      <th scope='col'>".$fila['servicio_fact']."</th>
				      <th scope='col'>".$fila['tiposer_fact']."</th>

				      <th scope='col'><a href='#' id='agregarALista' data-num_fact='".$fila['num_fact']."'  onClick=getPersona('".$fila['num_fact']."'); class='btn btn-success'>Agregar</a></th>

				    </tr>";
				}				  
			}
			
			
			$salida.="</tbody></table>";
		} else {
			$salida="No hay listas que tengan como destino la ciudad de ".$destino." :(";
		}
		echo $salida;
		$this->desconectar();
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////TERMINA PAQUETES PARA LISTAS DE ENVIO/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////





//////////////////////////////////////////////////////////////////////////////////
	function addFactura($factura){
		$this->conectar();
		//tenemos que mover esto hacia el ajax y enviar la respuesta como una cadena unicamente con los datos para el renglon de la tabla
		$salida="";
		$query="SELECT num_fact, servicio_fact, tiposer_fact from factura where num_fact=$factura";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$fila=$result->fetch_assoc();
			$salida=$fila['num_fact']." ".$fila['servicio_fact']." ".$fila['tiposer_fact'];
			
		} else {
			$salida="No hay listas que tengan el número de factura ".$factura." ";
		}
		echo $salida;
		$this->desconectar();
	}
////////////////////////////////////////////////////////////////////////////////






////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////OBTENER LOS VEHICULO-CONDUCTOR DISPONIBLES///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getConductorVehiculoDisponible(){
		$this->conectar();
		$query="SELECT nom_usu,ap_usu,modelo_vehi, marca_vehi from vehiculo join vehiculoconductor on vehiculo.cve_vehi=vehiculoconductor.cve_vehi join usuario on vehiculoconductor.cve_usu=usuario.cve_usu WHERE status_vehicon='disponible'";
		$result=$this->select($query);
		return $result;
		$this->desconectar();
	}
	function getConductor(){
		$this->conectar();
		//$query="SELECT usuario.cve_usu,nom_usu,ap_usu from usuario, vehiculoconductor WHERE tipo_usu='Conductor' and status_vehicon='disponible' and situacion_vehicon='excelentes'";
		$query="SELECT usuario.cve_usu,nom_usu,ap_usu from usuario WHERE tipo_usu='Conductor'";
		$result=$this->select($query);
		return $result;
		$this->desconectar();
	}
	function getVehiculo(){ 	 	
		$this->conectar();
		//$query="SELECT vehiculo.cve_vehi,modelo_vehi, marca_vehi from vehiculo, vehiculoconductor where status_vehicon='disponible' and situacion_vehicon='excelentes' ";
		$query="SELECT vehiculo.cve_vehi,modelo_vehi, marca_vehi from vehiculo";
		$result=$this->select($query);
		return $result;
		$this->desconectar();
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////TERMINA OBTENER LOS VEHICULO-CONDUCTOR DISPONIBLES///////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////OBTENER ORIGEN//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getOrigen(){
		$this->conectar();
		$query="SELECT ciu_dir from direccion join sucursal on direccion.cve_dir=sucursal.cve_dir";
		$result=$this->select($query);
		return $result;
		$this->desconectar();
	}
	function getSucursal(){
		$this->conectar();
		$salida="";
		//$query="SELECT nombre_suc, est_dir,ciu_dir,dir_diresp,cpcod_diresp from direccion join direccionespecifica on direccion.cve_dir=direccionespecifica.cve_dir join sucursal on direccionespecifica.cve_diresp=sucursal.cve_diresp where cve_suc=2";
		$query="SELECT nombre_suc, est_dir,ciu_dir,dir_dir,cpcod_dir from direccion join sucursal on direccion.cve_dir=sucursal.cve_dir where cve_suc=1";
		$result=$this->select($query);	
		if ($result) {
			$result->data_seek(0);
			$fila=$result->fetch_assoc();
			$salida=$fila['nombre_suc'].",".$fila['est_dir']." ".$fila['ciu_dir']." ".$fila['dir_dir']." ".$fila['cpcod_dir'];
		}
		return $salida;
		$this->desconectar();
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////TERMINA OBTENER ORIGEN//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////METODOS DE PROVEEDOR///////////////////////////////////////////////////////////////////////////////////

	function registrarProveedor($datos){
		$this->conectar();
			$this->transaccion();
			$query1="INSERT into direccion values(null,'".$datos[4]."','".$datos[5]."','".$datos[6]."','".$datos[7]."');";
			//echo $query1;
			$result1=$this->insertar($query1);
			$id=$this->lastId();
			$query2="INSERT into proveedor values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."','".$datos[3]."',$id);";
			//echo $query2;
			$result2=$this->insertar($query2);
			if ($result1==1 && $result2==1) {
				$this->commit();
				echo "<script>
					alert('Registrado con éxito!');
				 </script>"	;

			} else {
				$this->rollback();
				echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
			}
			$this->desconectar();
	}

	function listarProveedor(){
		$this->conectar();
		$salida="";
		$query="SELECT com_prov ,con_prov ,car_prov ,tel_prov, dir_dir from proveedor join direccion on proveedor.cve_dir=direccion.cve_dir";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT com_prov ,con_prov ,car_prov ,tel_prov,dir_dir from proveedor join direccion on proveedor.cve_dir=direccion.cve_dir WHERE com_prov LIKE '%".$q."%' OR con_prov LIKE '%".$q."%' OR tel_prov LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background:#323232; color:white;'>
				    <tr>
				      <th scope='col'>Compañía</th>
				      <th scope='col'>Contacto</th>
				      <th scope='col'>Cargo</th>
				      <th scope='col'>Teléfono</th>
				      <th scope='col'>Dirección</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$salida.="<tr>
				      <th scope='col'>".$fila['com_prov']."</th>
				      <th scope='col'>".$fila['con_prov']."</th>
				      <th scope='col'>".$fila['car_prov']."</th>
				      <th scope='col'>".$fila['tel_prov']."</th>
				      <th scope='col'>".$fila['dir_dir']."</th>
				      <th scope='col'><button id='eliminarProv' data-tel_prov='".$fila['tel_prov']."' class='btn btn-danger'>Eliminar</button></th>
				      <th scope='col'><a href='#' id='modificarProv' data-toggle='modal' data-target='#modalModProv' data-tel_prov='".$fila['tel_prov']."'  class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}
	function buscarProveedor($telefono){
		$this->conectar();
		$query="SELECT com_prov ,con_prov ,car_prov ,tel_prov,est_dir,ciu_dir,cpcod_dir,dir_dir,cve_prov from proveedor join direccion on proveedor.cve_dir=direccion.cve_dir where tel_prov='".$telefono."'";
		
		$result=$this->select($query);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$proveedor=$fila['com_prov'].",".$fila['con_prov'].",".$fila['car_prov'].",".$fila['tel_prov'].",".$fila['est_dir'].",".$fila['ciu_dir'].",".$fila['cpcod_dir'].",".$fila['dir_dir'].",".$fila['cve_prov'];
		echo $proveedor;
		return $result;
		$this->desconectar();
	}

	function modificarProveedor($datos){
		$this->conectar();
		$cve="select cve_dir from proveedor WHERE cve_prov=$datos[8]";
		//echo $cve;
		$result3=$this->select($cve);
		//print($result3);
		$result3->data_seek(0);
		$fila=$result3->fetch_assoc();
		$dir=$fila['cve_dir'];
		$query="UPDATE proveedor set com_prov='".$datos[0]."',con_prov='".$datos[1]."', car_prov='".$datos[2]."',tel_prov='".$datos[3]."' WHERE cve_prov=$datos[8]";
		$queriDir="UPDATE direccion set est_dir='".$datos[4]."', ciu_dir='".$datos[5]."', cpcod_dir='".$datos[6]."', dir_dir='".$datos[7]."' WHERE cve_dir=$dir " ;
		$result1=$this->update($query);
		$result2=$this->update($queriDir);
		if ($result1==1 && $result2==1) {
			echo "<script>
					alert('Actualizado con éxito!');
				 </script>"	;
			//self::listarUsuario();
		} else {
			echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
		}
		$this->desconectar();

		
	}

	function eliminarProveedor($telefonoProv){
		$this->conectar();
		$query="DELETE FROM proveedor WHERE tel_prov='".$telefonoProv."'";
		$result=$this->eliminar($query);
		if (!$result) {
			echo "Error al eliminar";
			exit();
		}else{	
			
			echo "Eliminado con éxito.";
		}
		$this->desconectar();
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////listas//////////////////////////////////////////////////////////////
	function registrarlista($listaP){
		$this->conectar();
		$this->transaccion();
		$queryLista="INSERT into listapaquete values(null,'en espera',curdate())";
		//echo $queryLista;
		$resultLista=$this->insertar($queryLista);
		$idLista=$this->lastId();
		$res=explode(",", $listaP);
		$resultRenglon=0;
		//echo $listaP;
		for($i=0;$i<count($res)-1;$i++){ 
    				$res1=explode(" ", $res[$i]);
    				$id= $res1[0];
    				$queryRenglon="INSERT into renglonlista values(null,$id,$idLista)";
    				//echo $queryRenglon;
    				$resultRenglon=$this->insertar($queryRenglon);
    				//echo $resultRenglon;
    				//$articulo=$res1[0];
    				//$cant=intval($res1[1]);
    				//$valor=floatval($res1[2]);
    				//$queryRenglon="INSERT into contenidopaquete values(null,'".$articulo."',$cant,$valor,$idPaquete)";
    				//$resultRenglon=$this->insertar($queryRenglon);
		}
		if ($resultLista==1 && $resultRenglon==1) {
					$this->commit();
					echo "<script> alert('Registrado con éxito!');</script>";
					} else {
					$this->rollback();
					echo "<script> alert('Error al registrar la lista!');</script>";
					}

	}

	function listarLista(){
		$this->conectar();
		$salida="";
		$query="SELECT folio_listapaq, statusentrega_listapaq ,fecha_listapaq  from listapaquete";		
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT folio_listapaq,statusentrega_listapaq ,fecha_listapaq from listapaquete  WHERE statusentrega_listapaq LIKE '%".$q."%' OR fecha_listapaq LIKE '%".$q."%'  ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background:#323232; color:white;'>
				    <tr>
				      <th scope='col'>Estado</th>
				      <th scope='col'>Fecha</th>
				       <th scope='col'>Modificar</th>
				        <th scope='col'>Ver detalles</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$folio=$fila['folio_listapaq'];
				$salida.="<tr>
				      <th scope='col'>".$fila['statusentrega_listapaq']."</th>
				      <th scope='col'>".$fila['fecha_listapaq']."</th>
				      <th scope='col'><a href='#' id='modificarLista' data-toggle='modal' data-target='#' data-folio_listapaq='".$fila['folio_listapaq']."'  class='btn btn-success'>Modificar</a></th>
				      <th scope='col'><a href='#' id='verLista' data-toggle='modal' data-target='#modalListaD' data-folio='".$fila['folio_listapaq']."'  class='btn btn-success'>ver Detalles</a></th>
				    </tr>";

			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();

	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////RUTA///////////////////////////////////////////

	function registrarRuta($datos){
		$this->conectar();
		$this->transaccion();
		$queryRuta="INSERT into ruta values(null,'null','".$datos[0]."','".$datos[1]."')";
		//echo $queryLista;
		$resultRuta=$this->insertar($queryRuta);
		$idRuta=$this->lastId();
		$res=explode(",", $datos[2]);
		$resultRenglon=0;
		for($i=0;$i<count($res)-1;$i++){ 
    				//$res[$i];
    				$queryRenglonR="INSERT into puntoruta values(null,'".$res[$i]."',$idRuta)";
    				//echo $queryRenglon;
    				$resultRenglonR=$this->insertar($queryRenglonR);
    				//echo $resultRenglon;
    				//$articulo=$res1[0];
    				//$cant=intval($res1[1]);
    				//$valor=floatval($res1[2]);
    				//$queryRenglon="INSERT into contenidopaquete values(null,'".$articulo."',$cant,$valor,$idPaquete)";
    				//$resultRenglon=$this->insertar($queryRenglon);
		}
		if ($resultRuta==1 && $resultRenglonR==1) {
					$this->commit();
					echo "<script> alert('Registrado con éxito!');</script>";
					} else {
					$this->rollback();
					echo "<script> alert('Error al registrar la ruta!');</script>";
					}


	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getRutas($origeDes){
		$this->conectar();
		$salida="";
		$res=explode(",",$origeDes);
		$origen=$res[0];
		$destino=$res[1];
		$queryRuta="select cve_ruta from ruta where origen_ruta='".$origen."' and destino_ruta='".$destino."' ";
		$result=$this->select($queryRuta);
		if ($result) {
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$clave=$fila["cve_ruta"];
				$queryPuntoRuta="select nom_puntoruta from puntoruta where cve_ruta=$clave ";
				$result2=$this->select($queryPuntoRuta);
				$result2->data_seek(0);
				$salida.="<option value=".$clave.">";
				while($fila2=$result2->fetch_assoc()){
					$salida.=$fila2['nom_puntoruta'].",";
				}
				$salida.="</option>@";
				
			}
		} else {
			$salida="";
		}
		
		
		echo $salida;
		$this->desconectar();
		/*echo "<script>
			var origenx= document.getElementById('origen').value;
	    	var destinox= document.getElementById('destino').value;
	    </script>";
	    $origenp=echo "<script> document.write(origenx) </script>";
	    $destinop=echo "<script> document.write(destinox) </script>";
	    echo $origen." ".$destino;
	    $this->conectar();
		$query="SELECT nom_usu,ap_usu,modelo_vehi, marca_vehi from vehiculo join vehiculoconductor on vehiculo.cve_vehi=vehiculoconductor.cve_vehi join usuario on vehiculoconductor.cve_usu=usuario.cve_usu WHERE status_vehicon='disponible'";
		$result=$this->select($query);
		return $result;
		$this->desconectar();*/
	}


		function getListasDestino($elegido){
		$this->conectar();
		$salida="";
		$user="";
		$resultR="";
		session_start();
		if (isset($_SESSION["admin"])) {
			//$user=echo $_SESSION["admin"];
		}
		//session_start();
		$user=$_SESSION["admin"]."".$_SESSION['idSuc'];
		$queryRuta="select origen_ruta, destino_ruta from ruta where cve_ruta=$elegido";
		$resultRuta=$this->select($queryRuta);
		$resultRuta->data_seek(0);
		$filaRuta=$resultRuta->fetch_assoc();
		$rutaOrigen=$filaRuta['origen_ruta'];
		$rutaDestino=$filaRuta['destino_ruta'];

		//---------------------------------------
		$puntoRuta="select nom_puntoruta from puntoruta join ruta on puntoruta.cve_ruta=ruta.cve_ruta where ruta.cve_ruta=$elegido";
		$resultPuntos=$this->select($puntoRuta);
		if($resultPuntos){
				$resultPuntos->data_seek(0);
				//---------------------------------
				$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background:#323232; color:white;'>
				    <tr>
				      <th scope='col'>Folio</th>
				      <th scope='col'>Fecha</th>
				       <th scope='col'>Cant. paquetes</th>
				        <th scope='col'>Agregar</th>
				    </tr>
				  </thead>
				  <tbody>";

				while ($filaPuntos=$resultPuntos->fetch_assoc()) {
					$destino=$filaPuntos['nom_puntoruta'];

					/*$queryLista="SELECT folio_listapaq, fecha_listapaq, count(num_fact) from factura join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir join listaPaquete join renglonlista on listaPaquete.folio_listapaq=renglonlista.folio_listapaq where statuspago_fact='en espera' and ciu_dir='".$destino."'";*/
					$queryListaD="select DISTINCT direccion.cve_dir from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir join remitente on factura.cve_rem=remitente.cve_rem where statusentrega_listapaq='en espera' and ciu_dir='".$destino."'";
					
					$resultD=$this->select($queryListaD);
					$resultD->data_seek(0);
					$filaDes=$resultD->fetch_assoc(); 
						$destinoDes=$filaDes['cve_dir'];
						$queryListaR="select listapaquete.folio_listapaq, fecha_listapaq, count(factura.num_fact) from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact join destinatario on factura.cve_dest=destinatario.cve_dest join remitente on factura.cve_rem=remitente.cve_rem join direccion on remitente.cve_dir=direccion.cve_dir where statusentrega_listapaq='en espera' and ciu_dir='".$rutaOrigen."' and destinatario.cve_dir=$destinoDes";
						//echo $queryListaR;
						$resultR=$this->select($queryListaR);
					if($resultR){	
					$resultR->data_seek(0);

					while ($filaRem=$resultR->fetch_assoc()) {
							$salida.="<tr>
						      <th scope='col'>".$filaRem['folio_listapaq']."</th>
						      <th scope='col'>".$filaRem['fecha_listapaq']."</th>
						      <th scope='col'>".$filaRem['count(factura.num_fact)']."</th>
						      <th scope='col'><a href='#' id='addListaViaje'  data-folio_listapaq='".$filaRem['folio_listapaq']."'  class='btn btn-success'>agregar</a></th>
						    </tr>";
				}
			}
						
			}

			$queryListaDestino="select DISTINCT direccion.cve_dir from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir join remitente on factura.cve_rem=remitente.cve_rem where statusentrega_listapaq='en espera' and ciu_dir='".$rutaDestino."' limit 1";
			$resultD=$this->select($queryListaDestino);
			$resultD->data_seek(0);
			$filaDes=$resultD->fetch_assoc();
			$destinoDes=$filaDes['cve_dir'];

			$queryListaR="select listapaquete.folio_listapaq, fecha_listapaq, count(factura.num_fact) from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact join destinatario on factura.cve_dest=destinatario.cve_dest join remitente on factura.cve_rem=remitente.cve_rem join direccion on remitente.cve_dir=direccion.cve_dir where statusentrega_listapaq='en espera' and ciu_dir='".$rutaOrigen."' and destinatario.cve_dir=$destinoDes";
						//echo $queryListaR;
						$resultR=$this->select($queryListaR);
					if ($resultR){
						$resultR->data_seek(0);

					while ($filaRem=$resultR->fetch_assoc()) {
							$salida.="<tr>
						      <th scope='col'>".$filaRem['folio_listapaq']."</th>
						      <th scope='col'>".$filaRem['fecha_listapaq']."</th>
						      <th scope='col'>".$filaRem['count(factura.num_fact)']."</th>
						      <th scope='col'><a href='#' id='addListaViaje'  data-folio_listapaq='".$filaRem['folio_listapaq']."'  class='btn btn-success'>agregar</a></th>
						    </tr>";
				}
			}
			
		}else{
			$salida="";
		}

		
	
	
		//for($i=0;$i<count($puntoRuta)-1;$i++){ 
			/*$query="SELECT folio_listapaq,fecha_listapaq from listaPaquete where ";
			$result=$this->select($query);
			if ($result->num_rows>0) {
				
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$salida.="<tr>
				      <th scope='col'>".$fila['statusentrega_listapaq']."</th>
				      <th scope='col'>".$fila['fecha_listapaq']."</th>
				      <th scope='col'><a href='#' id='modificarLista' data-toggle='modal' data-target='#' data-folio_listapaq='".$fila['folio_listapaq']."'  class='btn btn-success'>Modificar</a></th>
				      <th scope='col'><a href='#' id='verLista' data-toggle='modal' data-target=''   class='btn btn-success'>ver Detalles</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
			//} 
		//}
		*/
		echo $salida;
		$this->desconectar();
		/*
SELECT listapaquete.folio_listapaq, fecha_listapaq, count(factura.num_fact) from factura join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir join remitente on factura.cve_rem=remitente.cve_rem join direccion on direccion.cve_dir=remitente.cve_dir join listaPaquete join renglonlista on listaPaquete.folio_listapaq=renglonlista.folio_listapaq where statuspago_fact='en espera' and direccion.ciu_dir='atotonilco' and direccion.ciu_dir='zitacuaro'




SELECT num_fact, fech_fact, numguia_fact , monto_fact, statuspago_fact, servicio_fact, tiposer_fact from factura join destinatario on factura.cve_dest=destinatario.cve_dest join direccion on destinatario.cve_dir=direccion.cve_dir where statuspago_fact='en espera' and ciu_dir='".$destino."atotonilco"

select listapaquete.folio_listapaq, fecha_listapaq, count(factura.num_fact) from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact join destinatario on factura.cve_dest=destinatario.cve_dest join direcccion on destinatario.cve_dir=direccion.cve_dir join remitente on factura.cve_rem=remitente.cve_rem join direccion on remitente.cve_dir=direccion.cve_dir where statusentrega_listapaq="en espera" and */

	}



	function addFacturaViaje($factura){
		$this->conectar();
		//tenemos que mover esto hacia el ajax y enviar la respuesta como una cadena unicamente con los datos para el renglon de la tabla
		$salida="";
		$query="select listapaquete.folio_listapaq, fecha_listapaq, count(factura.num_fact) from listapaquete join renglonlista on listapaquete.folio_listapaq=renglonlista.folio_listapaq join factura on renglonlista.num_fact=factura.num_fact where listapaquete.folio_listapaq='".$factura."'";

		$result=$this->select($query);
		if ($result->num_rows>0) {
			$fila=$result->fetch_assoc();
			$salida=$fila['folio_listapaq']." ".$fila['fecha_listapaq']." ".$fila['count(factura.num_fact)'];
			
		} else {
			$salida="No hay listas que tengan el número de factura.".$factura." ";
		}
		echo $salida;
		$this->desconectar();
	}

	function getFecha(){
		$this->conectar();
		$salida="";
		$query="SELECT curdate()";
		$result=$this->select($query);
		$fila=$result->fetch_assoc();
		$salida=$fila['curdate()'];
		return $salida;
		$this->desconectar();
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////METODO PARA LA INSERCION DE VIAJES///////////////////////////////////////////////////////////7
	function insertarViaje($origen,$destino,$ruta,$conductor,$vehiculo,$listaFactura){
		$this->conectar();
		$this->transaccion();
		$queryVehCon="INSERT into vehiculoconductor values(null,$vehiculo,$conductor,'disponible','sucursal',null)";
		$resultVehCon=$this->insertar($queryVehCon);
		$idVehCon=$this->lastId();
		//echo $resultVehCon;
		//echo $idVehCon;
		//echo $ruta;
		$queryVia="INSERT into viaje values(null,curdate(),null,$idVehCon,$ruta)";
		$resultVia=$this->insertar($queryVia);
		$idVia=$this->lastId();
		//echo $resultVia;
		$factura=explode(",", $listaFactura);
		for ($i=0; $i <count($factura)-1 ; $i++) { 
			$id=$factura[$i];
			$queryRenVia="INSERT into renglonviaje values(null,$idVia,$id)";
			
			$resultRenVia=$this->insertar($queryRenVia);
			//echo $resultRenVia;
		}

		if ($resultVehCon==1 && $resultVia==1 && $resultRenVia==1) {
				$this->commit();
				echo "<script>
					alert('Registrado con éxito!');
				 </script>"	;

			} else {
				$this->rollback();
				echo "<script>
					alert('Error: verifique los datos.');
				</script>"	;
		}
			
			
			//header('Location:../registroUsuario.php');
		$this->desconectar();
	}


	function listarViaje(){
		$this->conectar();
		$salida="";
		$query="select fechaini_via, fechafin_via, concat(nom_usu,' ',ap_usu)as usuario, concat(modelo_vehi,' ',marca_vehi)as vehiculo, concat(origen_ruta,'-',destino_ruta)as ruta from ruta join viaje on ruta.cve_ruta=viaje.cve_ruta join vehiculoconductor on viaje.cve_vehicon=vehiculoconductor.cve_vehicon join vehiculo on vehiculoconductor.cve_vehi=vehiculo.cve_vehi join usuario on vehiculoconductor.cve_usu=usuario.cve_usu";
		if (isset($_POST['consulta'])) {
			/*$q=$this->escape($_POST['consulta']);
			$query="SELECT statusentrega_listapaq ,fecha_listapaq from listaPaquete  WHERE statusentrega_listapaq LIKE '%".$q."%' OR fecha_listapaq LIKE '%".$q."%'  ";*/
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background:#323232; color:white;'>
				    <tr>
				       <th scope='col'>Fecha inicio</th>
				       <th scope='col'>Fecha final</th>
				       <th scope='col'>Conductor</th>
				       <th scope='col'>Vehículo</th>
				       <th scope='col'>Ruta</th>
				       <th scope='col'>Modificar</th>
				       <th scope='col'>Ver detalles</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				//$datos=$fila['nom_usu'].",".$fila['ap_usu'];
				$salida.="<tr>
				      <th scope='col'>".$fila['fechaini_via']."</th>
				      <th scope='col'>".$fila['fechafin_via']."</th>
				      <th scope='col'>".$fila['usuario']."</th>
				      <th scope='col'>".$fila['vehiculo']."</th>
				      <th scope='col'>".$fila['ruta']."</th>
				      <th scope='col'><a href='#' id='modificarLista' data-toggle='modal' data-target='#' data-vehiculo='".$fila['vehiculo']."'  class='btn btn-success'>Modificar</a></th>
				      <th scope='col'><a href='#' id='verLista' data-toggle='modal' data-target=''   class='btn btn-success'>ver Detalles</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();

	}

}

	
?>

