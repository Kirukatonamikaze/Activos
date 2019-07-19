<?php 
	
	/**
	 * 
	 */
	if ($peticionAJAX){
		require_once '../core/configAPP.php';
	}else{
		require_once './core/configAPP.php';
	}
	class mainModel
	{
		protected function conectar(){
			$enlace = new PDO(SGBD,USER,PASS);
			return $enlace;
		}
		protected function conectarsqlsrv(){
			$enlace = new PDO(SGBDSRV,USERSRV,PASSSRV);
			return $enlace;
		}
		protected function ejecutar_consulta_simple($consulta){
			$respuesta = mainModel::conectar()->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}
		public function ejecutar_consulta_simple_sqlsrv($consulta){
			$mainModel = new mainModel();
			$con = $mainModel->conectarsqlsrv();
			$respuesta = $con->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}
		protected function datos_cuenta($codigo){
			$sql = mainModel::conectar()->prepare("SELECT * FROM tblusuarios WHERE PKId_Usuario = :Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}
		protected function agregar_cuenta($datos){
			$sql = self::conectar()->prepare("INSERT INTO tblusuarios VALUES(:Codigo,:Usuario,:Contrasena,:Empleado,:Estado,:Tipo)");
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Contrasena",$datos['Contrasena']);
			$sql->bindParam(":Empleado",$datos['Empleado']);
			$sql->bindParam(":Estado",$datos['Estado']);			
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->execute();
			return $sql;
		}
		protected function eliminar_cuenta($codigo){
			$sql = mainModel::conectar()->prepare("UPDATE tblusuarios SET FKId_TblEstado=2 WHERE FKDocumento_TblEmpleados = :Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}
		protected function actualizar_cuenta($datos){
			$sql = self::conectar()->prepare("UPDATE tblusuarios SET Nombre_Usuario=:Usuario, Contrasena_Usuario=:Contrasena WHERE PKId_Usuario = :Documento");
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Contrasena",$datos['Contrasena']);
			$sql->bindParam(":Documento",$datos['Documento']);
			$sql->execute();
			return $sql;
		}
		public function encryption($string){
			$output = FALSE;
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash("sha256", SECRET_IV), 0, 16);
			$output = openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output = base64_encode($output);
			return $output;
		}
		protected function decryption($string){
			$key = hash('sha256', SECRET_KEY);
			$iv = substr(hash('sha256', SECRET_IV), 0, 16);
			$output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
		protected function generar_codigo_aleatorio($letra, $longitud, $numero){
			for ($i=0; $i < $longitud; $i++){
				$num = rand(0,9);
				$letra .= $num;
			}
			return $letra."-".$numero;
		}
		protected function limpiar_cadena($cadena){
			$cadena = trim($cadena);
			$cadena = stripslashes($cadena);
			$cadena = str_replace("<script>", "", $cadena);
			$cadena = str_replace("</script>", "", $cadena);
			$cadena = str_replace("<script src>", "", $cadena);
			$cadena = str_replace("<script type>", "", $cadena);
			$cadena = str_replace("SELECT * FROM", "", $cadena);
			$cadena = str_replace("SELECT", "", $cadena);
			$cadena = str_replace("DELETE * FROM", "", $cadena);
			$cadena = str_replace("DELETE FROM", "", $cadena);
			$cadena = str_replace("INSERT INTO", "", $cadena);
			$cadena = str_replace("*", "", $cadena);
			$cadena = str_replace("--", "", $cadena);
			$cadena = str_replace("[", "", $cadena);
			$cadena = str_replace("]", "", $cadena);
			$cadena = str_replace(";", "", $cadena);
			$cadena = str_replace(":", "", $cadena);
			return $cadena;
		}
		protected function sweet_alert($datos){
			if ($datos['Alerta'] == "simple"){
				$alerta = "
						<script>
							swal(
								'".$datos['Titulo']."',
								'".$datos['Texto']."',
								'".$datos['Tipo']."'
							);
						</script>
						";
			}elseif ($datos['Alerta'] == "recargar"){
				$alerta = "
						<script>
							swal({
								title: '".$datos['Titulo']."',
								text: '".$datos['Texto']."',
								type: '".$datos['Tipo']."',
								confirmButtonText: 'Aceptar' 
							}).then(function(){
								location.reload();
							});
						</script>
						";
			}elseif ($datos['Alerta'] == "limpiar"){
				$alerta = "
						<script>
							swal({
								title: '".$datos['Titulo']."',
								text: '".$datos['Texto']."',
								type: '".$datos['Tipo']."',
								confirmButtonText: 'Aceptar' 
							}).then(function(){
								$('.FormularioAJAX')[0].reset();
							});
						</script>
						";
			}
			return $alerta;
		}

	}