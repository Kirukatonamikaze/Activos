<?php

if ($peticionAJAX){
	require '../modelos/registrosModelo.php';
}else{
	require './modelos/registrosModelo.php';
}

class registrosControlador extends registrosModelo
{
	public function cancelar_traslado_controlador(){
		session_start();
		unset($_SESSION['datos_activos']);
		unset($_SESSION['productos']);
		unset($_SESSION['activos_fincas']);
		$alerta = [
			"Alerta"=>"recargar",
			"Titulo"=>"Exitoso!!",
			"Texto"=>"se ha cancelado el traslado de manera exitosa",
			"Tipo"=>"success"
		];

		return mainModel::sweet_alert($alerta);
	}

	public function realizar_baja_controlador()
	{
		session_start();	
		$fecha = date('Y-m-d');
		$hora = date('h:i:s'); 
		$usuario  = mainModel::limpiar_cadena($_SESSION['usuario']->PKUsuario);
		$tipomovimiento = 4;
		$finca1 = 1996;
		$finca2 = 1996;
		$descripcion_movimiento = 3;
		$exitoso = 0;		
		$datos = $_SESSION['datos_activos'];
		foreach ($datos as $d){			
			$codigoproducto = $d['datos'][0];
			$ubicacionactivo = $d['datos'][2];	     	
			$responsable = mainModel::limpiar_cadena($_POST['txtdocumento_reponsablebajarecibe']);	
			$datos_registro = [
				"FKCodigo_TblFincas_Origen"=>$finca1,
				"FKCodigo_TblFincas_Destino"=>$finca2,
				"FKActivo"=>$codigoproducto,
				"FKUbicacion_Activo"=>$ubicacionactivo,
				"Hora_Registro"=>$hora,
				"Fecha_Registro"=>$fecha,
				"FKUsuario_TblUsuarios"=>$usuario,
				"FKTipo_Movimiento"=>$tipomovimiento,     				
				"Descripcion_Movimiento"=>$descripcion_movimiento,     			
				"Responsable"=>$responsable     			
			];  			
			$guardar_detalle = registrosModelo::guardar_movimiento_modelo($datos_registro);  
			$tipomovimiento = 4;    			
			$datos_registro2 = [
				"PKId_Activo"=>$codigoproducto,	
				"FKTipo_Movimiento"=>$tipomovimiento,
				"FKLocalicacion_tblFincas"=>$finca2
			];
			$actualizar_registro =  registrosModelo::Actualizar_estado_Activo($datos_registro2);
			if ($actualizar_registro->rowCount() >= 1){
				$exitoso = $exitoso + 1; 
			}else{
				$exitoso = 0;
			}     			
		}
		if ($guardar_detalle->rowCount() >= 1){
			unset($_SESSION['datos_activos']);	     	
			$alerta = [
				"Alerta"=>"recargar",
				"Titulo"=>"Exitoso",
				"Texto"=>"Datos Guardados",
				"Tipo"=>"success"
			];
		}else{
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error Inesperado",
				"Texto"=>"Fallo al guardar datos",
				"Tipo"=>"error"
			];
		}
		return mainModel::sweet_alert($alerta);
	}
	public function guardar_proveedor_controlador(){
		$nit = mainModel::limpiar_cadena($_POST['txtnit_proveedor']);
		$nombreproveedor = mainModel::limpiar_cadena($_POST['txtnombre_proveedor']);
		$razon_social = mainModel::limpiar_cadena($_POST['txtrazonsocial_proveedor']);
		$direccion = mainModel::limpiar_cadena($_POST['txtdireccion_proveedor']);
		$correo = mainModel::limpiar_cadena($_POST['txtcorreo_proveedor']);
		$telefono_proveedor = mainModel::limpiar_cadena($_POST['txttelefono_proveedor']);
		$pais = mainModel::limpiar_cadena($_POST['txtpais_proveedor']);
		$departamento = mainModel::limpiar_cadena($_POST['txtdepartamento_proveedor']);
		$ciudad = mainModel::limpiar_cadena($_POST['txtciudad_proveedor']);
		$tipo_proveedor = mainModel::limpiar_cadena($_POST['txttipo_proveedor']);
		$estado_proveedor = 'ACTIVO';
		if ($nit == "" || $nombreproveedor == "" ){
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error Inesperado",
				"Texto"=>"Cada uno de los campos con un asterisco (*) al lado son obligatorios para realizar un registro exitoso de la informacion, verifica que datos te hacen falta e intentalo de nuevo.",
				"Tipo"=>"error"
			];
		}else{
			$consulta = mainModel::ejecutar_consulta_simple("SELECT tblproveedores.PKNit FROM db_ci_tropical.tblproveedores WHERE PKNit = $nit OR Proveedor = '$nombreproveedor'");
			
			if ($consulta->rowCount() >= 1){
				$alerta = [
					"Alerta"=>"simple",
					"Titulo"=>"Error Inesperado",
					"Texto"=>"El proveedor ingresado ya se encuentra registrado en el sistema. Verifica la informacion e intentalo de nuevo.",
					"Tipo"=>"error"
				];
			}else{
				$datos_registro = [
					"PKNit"=>$nit,
					"Proveedor"=>$nombreproveedor,				
					"FKArea"=>$tipo_proveedor,
					"Estado"=>$estado_proveedor					
				];
				$guardar_registro = registrosModelo::guardar_proveedor_modelo($datos_registro);

				$datos_registro = [				
					"FKNit"=>$nit,							
					"Razon_Social"=>$razon_social,
					"Direccion"=>$direccion,
					"Correo"=>$correo,
					"Pais"=>$pais,
					"Departamento"=>$departamento,
					"Ciudad"=>$ciudad,	
					"Telefono"=>$telefono_proveedor

				];
				$guardar_registro = registrosModelo::guardar_detalle_proveedor_modelo($datos_registro);

				if ($guardar_registro->rowCount() >= 1){
					$alerta = [
						"Alerta"=>"recargar",
						"Titulo"=>"Exitoso!!",
						"Texto"=>"El proveedor ha sido registrado de manera exitosa en el sistema",
						"Tipo"=>"success"
					];
				}else{
					$alerta = [
						"Alerta"=>"simple",
						"Titulo"=>"Error inesperado",
						"Texto"=>"No se ha podido registrar el proveedor, por favor intentalo de nuevo.",
						"Tipo"=>"error"
					];
				}
			}
		}			
		return mainModel::sweet_alert($alerta);
	}	

	public function guardar_registro_controlador(){		
		session_start();
		$codigoproducto = mainModel::limpiar_cadena($_POST['txtcodigoproducto_reg']);
		$nombreproducto = mainModel::limpiar_cadena($_POST['txtnombreproducto_reg']);
		$subtipoproducto = mainModel::limpiar_cadena($_POST['cmbsubtipoproducto_reg']);
		$serie = mainModel::limpiar_cadena($_POST['txtserie_reg']);
		$marca = mainModel::limpiar_cadena($_POST['txtmarca_reg']);
		$modelo = mainModel::limpiar_cadena($_POST['txtmodelo_reg']);
		$color = mainModel::limpiar_cadena($_POST['color_reg']);
		$procesador = mainModel::limpiar_cadena($_POST['procesador']);
		$memoria = mainModel::limpiar_cadena($_POST['memoria']);
		$discoduro = mainModel::limpiar_cadena($_POST['discoduro']);
		$sistema = mainModel::limpiar_cadena($_POST['sistema']);
		$login = mainModel::limpiar_cadena($_POST['login']);
		$capacidad = mainModel::limpiar_cadena($_POST['txtcapacidad_reg']);
		$vidautil = mainModel::limpiar_cadena($_POST['cmbvidautil_reg']);			
		$proveedor = mainModel::limpiar_cadena($_POST['cmbproveedor_reg']);		
		$fechacompra = mainModel::limpiar_cadena($_POST['txtfechacompra_reg']);
		$numerofactura = mainModel::limpiar_cadena($_POST['txtnumerofacturac_reg']);
		$costo = mainModel::limpiar_cadena($_POST['txtcosto_reg']);
		$observaciones = mainModel::limpiar_cadena($_POST['txtobservaciones_reg']);	
		$sociedad = mainModel::limpiar_cadena($_POST['txtsociedad_reg']);	
		$tipomovimiento = 1;			
		$responsablesave = mainModel::limpiar_cadena($_SESSION['usuario']->PKUsuario);
		$localicacionactivo = 1996;
		$ubicacionactivo = 8;	
			
		if ($codigoproducto == "" || $nombreproducto == "" ||  $numerofactura == "" || $fechacompra == ""){
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error Inesperado",
				"Texto"=>"Cada uno de los campos con un asterisco (*) al lado son obligatorios para realizar un registro exitoso de la informacion, verifica que datos te hacen falta e intentalo de nuevo.",
				"Tipo"=>"error"
			];
		}else{
			$consulta = mainModel::ejecutar_consulta_simple("SELECT PKId_Activo FROM tblregistroactivoguardar WHERE PKId_Activo = $codigoproducto OR Serie = '$serie'");
			
			if ($consulta->rowCount() >= 1){
				$alerta = [
					"Alerta"=>"simple",
					"Titulo"=>"Error Inesperado",
					"Texto"=>"El producto ingresado ya se encuentra registrado en el sistema. Verifica la informacion e intentalo de nuevo.",
					"Tipo"=>"error"
				];
			}else{
				$datos_registro = [
					"PKId_Activo"=>$codigoproducto,
					"Nombre_Activo"=>$nombreproducto,			
					"FKSubtipo"=>$subtipoproducto,
					"Serie"=>$serie,
					"Marca"=>$marca,
					"Modelo"=>$modelo,
					"Color"=>$color,
					"Procesador"=>$procesador,
					"Memoria"=>$memoria,
					"Discoduro"=>$discoduro,
					"SistemaOperativo"=>$sistema,
					"Login"=>$login,
					"Capacidad"=>$capacidad,
					"FKVida_Util"=>$vidautil,
					"FKProveedor"=>$proveedor,
					"Fecha_Compra"=>$fechacompra,
					"N_Factura"=>$numerofactura,
					"Costo"=>$costo,
					"Observaciones"=>$observaciones,		
					"FKTipo_Movimiento"=>$tipomovimiento,
					"FKLocalicacion_tblFincas"=>$localicacionactivo,
					"FKRazon_social"=>$sociedad,
					"FKUsuario_TblUsuarios"=>$responsablesave
				];
				$guardar_registro = registrosModelo::guardar_registro_modelo($datos_registro);
				$finca_origen = 1996;
				$finca_destino = 1996;
				$fecha_movimiento = date('Y-m-d');
				$hora_movimiento = date('h:i:s');
				$tipomovimiento = 1;
				$descripcion_movimiento = 1;
				$responsablesave = mainModel::limpiar_cadena($_SESSION['usuario']->PKUsuario);
				$responsable = '1028029204';
				$ubicacionactivo = 8;
				$datos_registro2 =  [
					"FKActivo"=>$codigoproducto,			
					"FKCodigo_TblFincas_Origen"=>$finca_origen,
					"FKCodigo_TblFincas_Destino"=>$finca_destino,
					"Fecha_Registro"=>$fecha_movimiento,
					"Hora_Registro"=>$hora_movimiento,
					"FKUsuario_TblUsuarios"=>$responsablesave,
					"FKTipo_Movimiento"=>$tipomovimiento,
					"Descripcion_Movimiento"=>$descripcion_movimiento,
					"FKUbicacion_Activo"=>$ubicacionactivo,
					"Responsable"=>$responsable
				];
				$guardar_movimiento =  registrosModelo::guardar_movimiento_modelo($datos_registro2);
				if ($guardar_registro->rowCount() >= 1){
					$alerta = [
						"Alerta"=>"recargar",
						"Titulo"=>"Exitoso!!",
						"Texto"=>"Los datos se han guardado de manera correcta  en  el sistema.",
						"Tipo"=>"success"
					];
				}else{
					$alerta = [
						"Alerta"=>"simple",
						"Titulo"=>"Error Inesperado",
						"Texto"=>"Los datos no se han podido guardar en  el sistema. verifica la informacion que estas ingresando e intentalo de nuevo.",
						"Tipo"=>"error"
					];
				}
			}
		}
		return mainModel::sweet_alert($alerta);
	}

	public function buscar_registrotodos_controlador(){
		$user = $_SESSION['usuario']->PKUsuario;
		
		$dato = [
			"User"=>$user
		];		
		$datos = registrosModelo::buscar_registrotodos_modelo($dato)->fetchAll();
		return $datos;
	}

	public function buscar_registrotodosfull_controlador(){
		$datos = registrosModelo::buscar_registrotodosfull_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_registrosespecifico_controlador_detalle($dato){
		$txtcodigoproducto_reg = mainModel::decryption($dato);
		$datos_registro = [
			"Codigo"=>$txtcodigoproducto_reg
		];	

		$datos = registrosModelo::buscar_registrosespecifico_modelo_detalle($datos_registro);
		return $datos;
	}

	public function buscar_registrosespecifico_controlador($dato){
		$txtcodigoproducto_reg = mainModel::decryption($dato);
		$datos_registro = [
			"PKId_Activo"=>$txtcodigoproducto_reg
		];		

		$datos = registrosModelo::buscar_registrosespecifico_modelo($datos_registro);
		return $datos;
	}

	public function Actualizar_registro_controlador() {
		session_start();

		$codigoproducto = mainModel::limpiar_cadena($_POST['txtcodigoproducto_up']); 		 
		$nombreproducto = mainModel::limpiar_cadena($_POST['txtnombreproducto_up']); 		 
		$serial = mainModel::limpiar_cadena($_POST['txtserie_up']); 		 
		$marca = mainModel::limpiar_cadena($_POST['txtmarca_up']); 		 
		$modelo = mainModel::limpiar_cadena($_POST['txtmodelo_up']); 		 
		$color = mainModel::limpiar_cadena($_POST['txtcolor_up']);
		$procesador = mainModel::limpiar_cadena($_POST['txtprocesador_up']); 		 
		$memoria = mainModel::limpiar_cadena($_POST['txtmemoria_up']); 		 
		$discoduro = mainModel::limpiar_cadena($_POST['txtdisco_up']);        
		$sistema = mainModel::limpiar_cadena($_POST['txtsistema_up']);        
		$login = mainModel::limpiar_cadena($_POST['txtlogin_up']);        
		$capacidad = mainModel::limpiar_cadena($_POST['txtcapacidad_up']);        
		$observaciones = mainModel::limpiar_cadena($_POST['txtobservaciones_up']); 		 
		$datos_registro = [
			"PKId_Activo"=>$codigoproducto,
			"Nombre_Activo"=>$nombreproducto,
			"Serie"=>$serial,
			"Marca"=>$marca,
			"Modelo"=>$modelo,
			"Color"=>$color,
			"Procesador"=>$procesador,
			"Memoria"=>$memoria,
			"Discoduro"=>$discoduro,
			"SistemaOperativo"=>$sistema,
			"Login"=>$login,
			"Capacidad"=>$capacidad,	
			"Observaciones"=>$observaciones
		];

		$actualizar_registro = registrosModelo::actualizar_registro_modelo($datos_registro);
		if ($actualizar_registro->rowCount() >= 1){
			$alerta = [
				"Alerta"=>"recargar",
				"Titulo"=>"Exitoso!!",
				"Texto"=>"Los datos del activo ha sido actulizados de manera exitosa en el sistema.",
				"Tipo"=>"success"
			];
		}else{
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error inesperado",
				"Texto"=>"No se ha podido actualizar los datos del activo, por favor intentalo de nuevo.",
				"Tipo"=>"error"
			];
		}
		return mainModel::sweet_alert($alerta);
	}

	public function agregar_productos_controlador(){
		session_start();		
		$txtcodigoproducto = mainModel::limpiar_cadena($_POST['txtcodigoproducto_add']);
		$txtnombreproducto = mainModel::limpiar_cadena($_POST['txtnombreproducto_add']);
		$txtubicacionproducto = mainModel::limpiar_cadena($_POST['cmbubicacionproducto']);     	
		$_SESSION['productos'][] = $_POST;
		$alerta = [
			"Alerta"=>"recargar",
			"Titulo"=>"Exitoso!!",
			"Texto"=>"Datos Agregados con exito",
			"Tipo"=>"success"
		];
		mainModel::sweet_alert($alerta);
	}
	public function agregar_productos_controlador3(){
		session_start();		
		$cmbfinca_origen = mainModel::limpiar_cadena($_POST['cmbfinca_origen']);
		$txtcodigoproducto = mainModel::limpiar_cadena($_POST['txtcodigoproducto_baja']);
		$txtnombreproducto = mainModel::limpiar_cadena($_POST['txtnombreproducto_add']);
		$txtubicacionproducto = mainModel::limpiar_cadena($_POST['cmbubicacionproducto']);     	
		$_SESSION['productos'][] = $_POST;
		$alerta = [
			"Alerta"=>"recargar",
			"Titulo"=>"Exitoso!!",
			"Texto"=>"Datos Agregados con exito",
			"Tipo"=>"success"
		];
		
		mainModel::sweet_alert($alerta);
	}

	public function buscar_responsable_controlador()
	{
		$documento = mainModel::limpiar_cadena($_POST['txtdocumentoresponsable']);
		$dato = [
			"Documento"=>$documento
		];
		$responsable = registrosModelo::buscar_responsable_modelo($dato)->fetch();
		return $responsable;


	}

	public function guardartraslado_registros_controlador(){   	
		$fecha = date('Y-m-d');
		$hora = date('h:i:s'); 
		$usuario  = mainModel::limpiar_cadena($_SESSION['usuario']->PKUsuario);
		$tipomovimiento = 3;
		$descripcion_movimiento = 3;
		$exitoso = 0;		
		$datos = $_SESSION['datos_activos'];
		foreach ($datos as $d){
			$finca1 = $d['datos'][3];
			$finca2 = $d['datos'][4];
			$codigoproducto = $d['datos'][0];
			$ubicacionactivo = $d['datos'][2];	     	
			$responsable = mainModel::limpiar_cadena($_POST['txtnombre_reponsabletrasladorecibe']);	
			$datos_registro = [
				"FKCodigo_TblFincas_Origen"=>$finca1,
				"FKCodigo_TblFincas_Destino"=>$finca2,
				"FKActivo"=>$codigoproducto,
				"FKUbicacion_Activo"=>$ubicacionactivo,
				"Hora_Registro"=>$hora,
				"Fecha_Registro"=>$fecha,
				"FKUsuario_TblUsuarios"=>$usuario,
				"FKTipo_Movimiento"=>$tipomovimiento,     				
				"Descripcion_Movimiento"=>$descripcion_movimiento,     			
				"Responsable"=>$responsable     			
			];  	

			$guardar_detalle = registrosModelo::guardar_movimiento_modelo($datos_registro);  
			$tipomovimiento = 2;    			
			$datos_registro2 = [
				"PKId_Activo"=>$codigoproducto,	
				"FKTipo_Movimiento"=>$tipomovimiento,
				"FKLocalicacion_tblFincas"=>$finca2
			];
			$actualizar_registro =  registrosModelo::Actualizar_estado_Activo($datos_registro2);
			if ($actualizar_registro->rowCount() >= 1){
				$exitoso = $exitoso + 1; 
			}else{
				$exitoso = 0;
			}     			
		}
		if ($guardar_detalle->rowCount() >= 1){
			unset($_SESSION['datos_activos']);	     	
			$alerta = [
				"Alerta"=>"recargar",
				"Titulo"=>"Exitoso",
				"Texto"=>"Datos Guardados",
				"Tipo"=>"success"
			];
		}else{
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error Inesperado",
				"Texto"=>"Fallo al guardar datos",
				"Tipo"=>"error"
			];
		}
		return mainModel::sweet_alert($alerta);
	}     

	public function guardarasignacion_registros_controlador(){  	
		
		$Responsable_RECIBE = mainModel::limpiar_cadena($_POST['txtnombre_reponsable_asignacion']);
		$exitoso = 0;
		$fecha =date('Y-m-d');
		$tipomovimiento = 2;
		$datos = $_SESSION['productos'];		
		foreach ($datos as $d){     			
			$codigoproducto = $d['txtcodigoproducto_add'];
			$ubicacionactivo = $d['cmbubicacionproducto'];
			$finca_origen = 1996;
			$finca_destino = $d['txtcodigo_finca_add'];				
			$fecha_movimiento = date('Y-m-d');
			$hora_movimiento = date('h:i:s');
			$tipomovimiento = 2;
			$descripcion_movimiento = 2;
			$responsablesave = mainModel::limpiar_cadena($_SESSION['usuario']->PKUsuario);			
			$responsable = mainModel::limpiar_cadena($_POST['txtdocumento_reponsable_asignacion']);	
			$datos_registro = [ 
				"FKActivo"=>$codigoproducto,     		
				"FKCodigo_TblFincas_Origen"=>$finca_origen,
				"FKCodigo_TblFincas_Destino"=>$finca_destino,
				"FKUbicacion_Activo"=>$ubicacionactivo,
				"Fecha_Registro"=>$fecha_movimiento,
				"Hora_Registro"=>$hora_movimiento,
				"FKUsuario_TblUsuarios"=>$responsablesave,
				"FKTipo_Movimiento"=>$tipomovimiento,
				"Responsable"=>$Responsable_RECIBE,
				"Descripcion_Movimiento"=>$descripcion_movimiento
			];    		   		
			$guardar_detalle = registrosModelo::guardar_movimiento_modelo($datos_registro);
			$tipomovimiento = 2;
			$datos_registro = [
				"PKId_Activo"=>$codigoproducto,			
				"FKTipo_Movimiento"=>$tipomovimiento,
				"FKUbicacion_Activo"=>$ubicacionactivo,
				"FKLocalicacion_tblFincas"=>$finca_destino
			]; 	
			$actualizar_registro =  registrosModelo::Actualizar_estado_Activo($datos_registro);
			if ($guardar_detalle->rowCount() >= 1){
				$exitoso = $exitoso + 1; 
			}else{
				$exitoso = 0;
			}
		}	
		if ($guardar_detalle->rowCount() >= 1){
			unset($_SESSION['datos_activos']);
			unset($_SESSION['productos']);
			$alerta = [
				"Alerta"=>"recargar",
				"Titulo"=>"Exitoso",
				"Texto"=>"Datos Guardados de manera exitosa",
				"Tipo"=>"success"
			];
		}else{
			$alerta = [
				"Alerta"=>"simple",
				"Titulo"=>"Error Inesperado",
				"Texto"=>"Fallo al guardar datos",
				"Tipo"=>"error"
			];
		}
		return mainModel::sweet_alert($alerta);
	}
	public function buscar_fincas_controlador(){
		$datos = registrosModelo::buscar_fincas_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_regitrosactivos_controlador(){
		session_start();
		$txtcodigo_finca = mainModel::limpiar_cadena($_POST['cmbfinca_opcion']);
		if ($txtcodigo_finca == 0) {
			$datos = registrosModelo::buscar_registrofinca_todos_modelo()->fetchAll();
			$_SESSION['activos_fincas'] = $datos;
			$_SESSION['activos_fincas'][0]['Existe'] = 1;
		}else{
			$datos_registro = [
				"Finca"=>$txtcodigo_finca
			];
			$datos = registrosModelo::buscar_registrofinca_modelo($datos_registro)->fetchAll();
			$_SESSION['activos_fincas'] = $datos;
		}
		
		return $datos;
	}
	public function buscar_traslado_finca_controlador(){
		session_start();
		$txtcodigo_finca = mainModel::limpiar_cadena($_POST['cmbfincatraslado1']);
		$datos_registro = [
			"Finca"=>$txtcodigo_finca
		];
		$datos = registrosModelo::buscar_traslado_finca_modelo($datos_registro)->fetchAll();
		$_SESSION['activos_fincas'] = $datos;
		return $datos;
	}

	public function buscar_regitrosactivos_finca_controlador(){
		$txtcodigo_finca = mainModel::limpiar_cadena($_POST['pos']);
		$datos_registro = [
			"Finca"=>$txtcodigo_finca
		];
		$datos = registrosModelo::buscar_regitrosactivos_finca_modelo($datos_registro)->fetchAll();
		?>
		<table id="bootstrap-data-table-export" style="width: 100%;" class="tblactivosfincas table table-striped table-bordered tabla display table-responsive">
			<thead>
				<tr>
					<th>Activo</th>                             
					<th>Nombre</th> 
					<th>Serie</th>                        
					<th>Marca</th>
					<th>Modelo</th>
					<th>Color</th>
				</tr>
			</thead>
			<tbody>                  
				<?php foreach ($datos as $r): ?>
					<tr style="cursor: pointer;">
						<td><?php echo $r['Codigo']; ?>
						<td><?php echo $r['Nombre']; ?></td> 
						<td><?php echo $r['Serie']; ?></td>                         
						<td><?php echo $r['Marca']; ?></td>
						<td><?php echo $r['Modelo']; ?></td>
						<td><?php echo $r['Color']; ?></td>
					</tr>
				<?php  endforeach ?>
			</tbody>
		</table>
		<script src="<?php echo SERVERURL ?>vistas/assets/js/init-scripts/data-table/datatables-init.js"></script>
		<?php  
	}

	public function buscar_regitrosactivos_finca_controlador2(){
		$txtcodigo_finca = mainModel::limpiar_cadena($_POST['pos1']);
		$datos_registro = [
			"Finca"=>$txtcodigo_finca
		];
		$datos = registrosModelo::buscar_regitrosactivos_finca_modelo($datos_registro)->fetchAll();
		?>
		<table id="bootstrap-data-table-export" style="width: 100%;" class="table table-striped table-bordered tabla display">
			<thead>
				<tr>
					<th>Activo</th>                             
					<th>Nombre</th> 
					<th>Serie</th>                        
					<th>Marca</th>
					<th>Modelo</th>
					<th>Color</th>
				</tr>
			</thead>
			<tbody>                  
				<?php foreach ($datos  as $r): ?>
					<tr style="cursor: pointer;">
						<td><?php echo $r['Codigo']; ?>
						<td><?php echo $r['Nombre']; ?></td> 
						<td><?php echo $r['Serie']; ?></td>                         
						<td><?php echo $r['Marca']; ?></td>
						<td><?php echo $r['Modelo']; ?></td>
						<td><?php echo $r['Color']; ?></td>
					</tr>
				<?php  endforeach ?>
			</tbody>
		</table>
		<script src="<?php echo SERVERURL ?>vistas/assets/js/init-scripts/data-table/datatables-init.js"></script>
		<?php  
	}	
}
?>	
