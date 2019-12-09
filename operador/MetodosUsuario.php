<?php
require_once("InterfazConexion.php");
class MetodosUsuario extends Conexion
{
	
	function validarUsuario($datos){
		$this->conectar();
		session_start();
		$pass=sha1($datos[1]);

		$query2="select cve_usu, sucursal.cve_suc from usuario join sucursal on usuario.cve_suc=sucursal.cve_suc where tipo_usu = 'Conductor' and correo_usu='".$datos[0]."' and pass_usu='".$pass."'";

		$result2=$this->select($query2);
		if($result2->num_rows>0){
			$fila=$result2->fetch_assoc();
			$_SESSION["usuario"]=$datos[0];
			$_SESSION["idUser"]=$fila['cve_usu'];
			$_SESSION['idSuc']=$fila['cve_suc'];
			return 1;
		} else{
			return 0;
		}
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

	function listarFactura(){
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		session_start();
		$user = $_SESSION["usuario"];
		$this->conectar();
		$salida="";
		$query="SELECT f.num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact  FROM factura AS f JOIN recogerpaquete AS rp ON f.num_fact = rp.num_fact JOIN usuario AS us ON us.cve_usu = rp.cve_usu  WHERE status_fact=\"Confirmado\" AND correo_usu = '".$user."'";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT f.num_fact, fech_fact, numguia_fact, monto_fact, statuspago_fact, servicio_fact, tiposer_fact FROM factura AS f JOIN recogerpaquete AS rp ON f.num_fact = rp.num_fact JOIN usuario AS us ON us.cve_usu = rp.cve_usu WHERE status_fact=\"Confirmado\" and num_fact LIKE '%".$q."%' OR numguia_fact LIKE '%".$q."%' OR fech_fact LIKE '%".$q."%' ";
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
				      <th scope='col'>Status pago</th>
				      <th scope='col'>Servicio</th>
				      <th scope='col'>Tipo servicio</th>
				      <th scope='col'>Origen/Destino</th>
				      <th scope='col'>Direccion</th>
				      <th scope='col'>Confimar</th>
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
				      <th scope='col'>".$filaOD['origen']."</th>
				      <th scope='col'><button id='cambiarStatusP' data-num_fact='".$fila['num_fact']."' class='btn btn-info'>Recogido</button></th>

				      <th scope='col'><a href='#' id='verMasFactura' data-toggle='modal' data-target='#modalVerMasFactura' data-num_fact='".$fila['num_fact']."' onClick=getPersona('".$fila['num_fact']."'); class='btn btn-success'>Ver más</a></th>

				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos de factura:(";
		}
		echo $salida;
		$this->desconectar();
	}


		function listarPaquete($factura){
		$this->conectar();
		$salida1="";
		$query="SELECT cve_paq, largo_paq, alto_paq, ancho_paq, pes_paq,fech_fact,monto_fact,servicio_fact,(SELECT concat(nombre_rem,' ',ap_rem)as nombreRem from direccion join remitente on direccion.cve_dir=remitente.cve_dir join factura on remitente.cve_rem=factura.cve_rem where factura.num_fact='".$factura."')as origen, (SELECT concat(nombre_dest,' ',ap_dest)as nombreDes from direccion join destinatario on direccion.cve_dir=destinatario.cve_dir join factura on destinatario.cve_dest=factura.cve_dest where factura.num_fact='".$factura."')as destino from paquete join factura on paquete.num_fact=factura.num_fact WHERE factura.num_fact='".$factura."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$result->data_seek(0);
			$filaPaq=$result->fetch_assoc();
			
			$salida1=$salida1."$".$filaPaq['fech_fact']."?".$filaPaq['monto_fact']."?".$filaPaq['servicio_fact']."?".$filaPaq['origen']."?".$filaPaq['destino']."?".$filaPaq['cve_paq']."?".$filaPaq['largo_paq']."?".$filaPaq['alto_paq']."?".$filaPaq['ancho_paq']."?".$filaPaq['pes_paq'];
		} else {
			$salida1="No hay datos :(";
		}
		echo $salida1;
		$this->desconectar();
	}

		
////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////TERMINA PAQUETES PARA LISTAS DE ENVIO/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////OBTENER ORIGEN//////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
	function getSucursal(){
		$this->conectar();
		$salida="";
		$query="SELECT nombre_suc, est_dir,ciu_dir,dir_dir,cpcod_dir from direccion join sucursal on direccion.cve_dir=sucursal.cve_dir where cve_suc=2";
		$result=$this->select($query);	
		if ($result) {
			$result->data_seek(0);
			$fila=$result->fetch_assoc();
			$salida=$fila['nombre_suc'].",".$fila['est_dir']." ".$fila['ciu_dir']." ".$fila['dir_dir']." ".$fila['cpcod_dir'];
		}
		return $salida;
		$this->desconectar();
	}


	function listarArticulo($factura){
		$this->conectar();
		$salida1="";
		$query="SELECT cve_conpaq, articulo_conpaq, cant_conpaq, valor_conpaq FROM contenidopaquete AS cp JOIN paquete AS p on cp.cve_paq = p.cve_paq WHERE p.num_fact='".$factura."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida1.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Clave</th>
				      <th scope='col'>Articulo</th>
				      <th scope='col'>Cantidad</th>
				      <th scope='col'>Valor</th>
				      <th scope='col'>Eliminar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while($filaPaq=$result->fetch_assoc()){
				$salida1.="<tr>
				      <th scope='col'>".$filaPaq['cve_conpaq']."</th>
				      <th scope='col'>".$filaPaq['articulo_conpaq']."</th>
				      <th scope='col'>".$filaPaq['cant_conpaq']."</th>
				      <th scope='col'>".$filaPaq['valor_conpaq']."</th>
				      <th scope='col'><button type='button' id='eliminarArt' data-cve_conpaq='".$filaPaq['cve_conpaq']."@".$filaPaq['cant_conpaq']."@".$filaPaq['valor_conpaq']."' class='btn btn-danger'>Eliminar</button></th>
				    </tr>";
			}
			
			$salida1.="</tbody></table>";
			
		} else {
			$salida1="No hay datos :(";
		}
		echo $salida1;
		$this->desconectar();
	}

	function eliminarArticulo($clavePaq, $cantidad, $precio, $paquete){
		$this->conectar();
		$query="DELETE FROM contenidopaquete WHERE cve_conpaq='".$clavePaq."'";
		$result=$this->eliminar($query);
		$queryUpdate = "UPDATE paquete SET valortot_paq = valortot_paq - ".$precio.", cantot_paq = cantot_paq - ".$cantidad." WHERE cve_paq = ".$paquete;
		$result3 = $this->update($queryUpdate);
		if (!$result && !$result3) {
			echo "Error al eliminar";
			exit();
		}else{	
			echo "Eliminado con éxito";
		}
		$this->desconectar();
	}

	function cambiarEstadoArticulo($claveFac){
		$this->conectar();
		$query="UPDATE factura SET status_fact = \"en espera\" WHERE num_fact='".$claveFac."'";
		$result=$this->update($query);
		if (!$result) {
			echo "Error al actualizar";
			exit();
		}else{	
			echo "actualizado con éxito";
		}
		$this->desconectar();
	}
	
	function actualizarPaquete($claveP, $largo, $alto, $ancho, $peso){
		$this->conectar();
		$query="UPDATE paquete SET largo_paq ='".$largo."', alto_paq = '".$alto."', ancho_paq = '".$ancho."', pes_paq = '".$peso."'  WHERE cve_paq='".$claveP."'";
		$result=$this->update($query);
		if (!$result) {
			echo "Error al actualizar";
			exit();
		}else{	
			echo "actualizado con éxito";
		}
		$this->desconectar();
	}

	function fijarMasArticulos($arregloArticulos, $clavePaq){
		$this->conectar();
		$resultRenglon=0;
		for($i=0;$i<count($arregloArticulos)-1;$i++){ 
			$res1=explode("@", $arregloArticulos[$i]);
			$articulo=$res1[0];
			$cant=intval($res1[1]);
			$valor=floatval($res1[2]);
			

			$queryRenglon="INSERT into contenidopaquete values(null,'".$articulo."',$cant,$valor,$clavePaq)";
			$resultRenglon=$this->insertar($queryRenglon);

			$queryUpdate = "UPDATE paquete SET cantot_paq = cantot_paq + ".$cant.", valortot_paq = valortot_paq + ".$valor * $cant." WHERE cve_paq = ".$clavePaq;
			$result=$this->update($queryUpdate);
			if (!$result) {
				echo "Error al actualizar";
				exit();
			}else{	
				echo "actualizado con éxito";
			}
			
		}
	}

}

	
?>

