<?php

if ($peticionAJAX){
	require '../core/mainModel.php';
}else{
	require './core/mainModel.php';
}
class registrosModelo extends mainModel
{
	protected function guardar_movimiento_modelo($datos){
		$finca1 = $datos['FKCodigo_TblFincas_Origen'];
		$finca2 = $datos['FKCodigo_TblFincas_Destino'];
		$fecha = $datos['Fecha_Registro'];
		$hora = $datos['Hora_Registro'];			
		$codigoproducto = $datos['FKActivo'];
		$usuario = $datos['FKUsuario_TblUsuarios'];
		$tipomovimiento = $datos['FKTipo_Movimiento'];
		$descripcion_movimiento = $datos['Descripcion_Movimiento'];
		$responsable = $datos['Responsable'];
		$ubicacionactivo = $datos['FKUbicacion_Activo'];

		$sql = mainModel::conectar()->prepare("INSERT INTO tblmovimientos(PKId_Movimiento, FKActivo, Descripcion_Movimiento, FKCodigo_TblFincas_Origen, FKCodigo_TblFincas_Destino,FKUbicacion_Activo, Fecha_Registro, Hora_Registro, FKUsuario_TblUsuarios, FKTipo_Movimiento, Responsable) VALUES (null,$codigoproducto,'$descripcion_movimiento',$finca1,$finca2,$ubicacionactivo,'$fecha','$hora','$usuario',$tipomovimiento,'$responsable')"); 		
		$sql->execute();
		return $sql;

	}
	protected function guardar_proveedor_modelo($datos)
	{
		$nit = $datos['PKNit'];
		$nombreproveedor = $datos['Proveedor'];		
		$tipo_proveedor = $datos['FKArea'];
		$estado_proveedor = $datos['Estado'];
		
		
		$sql = mainModel::conectar()->prepare("INSERT INTO db_ci_tropical.tblproveedores ( PKNit , Proveedor   , Estado , FKArea ) VALUES ($nit,'$nombreproveedor','$estado_proveedor',$tipo_proveedor)");
		$sql->execute();
		return $sql;

	}
	protected function guardar_detalle_proveedor_modelo($datos)
	{
		$nit = $datos['FKNit'];			
		$razon_social = $datos['Razon_Social'];
		$direccion = $datos['Direccion'];
		$correo = $datos['Correo'];
		$pais = $datos['Pais'];
		$departamento = $datos['Departamento'];
		$ciudad = $datos['Ciudad'];
		$telefono_proveedor = $datos['Telefono'];
		
		$sql = mainModel::conectar()->prepare("INSERT INTO  db_ci_tropical.tbldetalle_proveedor ( PKId, FKNit ,  Razon_Social ,  Direccion ,  Correo ,  Pais ,  Departamento ,  Ciudad ,  Telefono ) VALUES (null,'$nit','$razon_social','$direccion','$correo','$pais','$departamento','$ciudad',$telefono_proveedor)");
		$sql->execute();
		return $sql;

	}
	protected function buscar_responsable_modelo($dato){
		$sql = mainModel::conectarsqlsrv()->prepare("SELECT					
			tblTrabajador.strNombre1,
			tblTrabajador.strApellido1

			FROM
			tblTrabajador, tblSucursal
			WHERE
			tblTrabajador.strDocumento = :Documento AND
			tblSucursal.idSucursal = tblTrabajador.idSucursal AND
			tblTrabajador.strEstadoTrabajador = 'Activo'");

		$sql->bindParam(":Documento",$dato['Documento']);
		$sql->execute();
		return $sql;
	}

	protected function guardar_registro_modelo($datos){

		$codigoproducto = $datos['PKId_Activo'];
		$nombreproducto = $datos['Nombre_Activo'];
		$subtipoproducto = $datos['FKSubtipo'];
		$serie = $datos['Serie'];
		$marca = $datos['Marca'];
		$modelo = $datos['Modelo'];
		$color = $datos['Color'];
		$procesador = $datos['Procesador'];
		$memoria = $datos['Memoria'];
		$discoduro = $datos['Discoduro'];
		$sistema = $datos['SistemaOperativo'];
		$login = $datos['Login'];
		$capacidad = $datos['Capacidad'];
		$vidautil = $datos['FKVida_Util'];
		$proveedor = $datos['FKProveedor'];
		$fechacompra = $datos['Fecha_Compra'];
		$numerofactura = $datos['N_Factura'];
		$costo = $datos['Costo'];
		$observaciones = $datos['Observaciones'];
		$tipomovimiento = $datos['FKTipo_Movimiento'];					
		$responsablesave = $datos['FKUsuario_TblUsuarios'];			
		$localicacionactivo = $datos['FKLocalicacion_tblFincas'];
		$sociedad = $datos['FKRazon_social'];

		$sql = mainModel::conectar()->prepare("INSERT INTO  tblregistroactivoguardar ( PKId_Activo ,  Nombre_Activo ,  FKSubtipo ,  Serie ,  Marca ,  Modelo ,  Color ,  Procesador ,  Memoria ,  Discoduro ,  SistemaOperativo ,  Login ,  Capacidad ,  FKVida_Util ,  FKProveedor ,  Fecha_Compra ,  N_Factura ,  Costo ,  Observaciones ,  FKTipo_Movimiento ,  FKUsuario_TblUsuarios ,  FKLocalicacion_tblFincas, FKRazon_social )
			VALUES (:PKId_Activo,:Nombre_Activo,:FKSubtipo,:Serie,:Marca,:Modelo,:Color,:Procesador,:Memoria,:Discoduro,:SistemaOperativo,:Login,:Capacidad,:FKVida_Util,:FKProveedor,:Fecha_Compra,:N_Factura,:Costo,:Observaciones,:FKTipo_Movimiento,:FKUsuario_TblUsuarios,:FKLocalicacion_tblFincas, :FKRazon_social )");		
		
		$sql->bindParam(":PKId_Activo",$codigoproducto);
		$sql->bindParam(":Nombre_Activo",$nombreproducto);
		$sql->bindParam(":FKSubtipo",$subtipoproducto);
		$sql->bindParam(":Serie",$serie);
		$sql->bindParam(":Marca",$marca);
		$sql->bindParam(":Modelo",$modelo);
		$sql->bindParam(":Color",$color);
		$sql->bindParam(":Procesador",$procesador);
		$sql->bindParam(":Memoria",$memoria);
		$sql->bindParam(":Discoduro",$discoduro);
		$sql->bindParam(":SistemaOperativo",$sistema);
		$sql->bindParam(":Login",$login);
		$sql->bindParam(":Capacidad",$capacidad);
		$sql->bindParam(":FKVida_Util",$vidautil);
		$sql->bindParam(":FKProveedor",$proveedor);		
		$sql->bindParam(":Fecha_Compra",$fechacompra);
		$sql->bindParam(":N_Factura",$numerofactura);
		$sql->bindParam(":Costo",$costo);
		$sql->bindParam(":Observaciones",$observaciones);	
		$sql->bindParam(":FKTipo_Movimiento",$tipomovimiento);
		$sql->bindParam(":FKUsuario_TblUsuarios",$responsablesave);			
		$sql->bindParam(":FKLocalicacion_tblFincas",$localicacionactivo);			
		$sql->bindParam(":FKRazon_social",$sociedad);			
		$sql->execute();
		return $sql;
	}

	protected function eliminar_registro_modelo($datos){
		$sql = mainModel::conectar()->prepare("UPDATE tblsolicitudes SET Estado_Registro = :Estado_Registro WHERE PKId_Solicitud = :N_Solicitud");
		$sql->bindParam(":Estado_Registro",$datos['Estado_Registro']);
		$sql->bindParam(":N_Solicitud",$datos['N_Solicitud']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_registrosespecifico_modelo_detalle($datos){
		$sql = mainModel::conectar()->prepare("SELECT
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tbltipoactivos.Descripcion As Tipo,
			tblsubtipoactivos.Descripcion As Subtipo,
			tblregistroactivoguardar.Serie AS Serie,
			tblregistroactivoguardar.Marca AS Marca,
			tblregistroactivoguardar.Modelo AS Modelo,
			tblregistroactivoguardar.Color AS Color,
			tblregistroactivoguardar.Procesador As Procesador,
			tblregistroactivoguardar.Memoria As Memoria,
			tblregistroactivoguardar.Discoduro As Disco,
			tblregistroactivoguardar.SistemaOperativo AS Sistema,
			tblregistroactivoguardar.Login,
			tblregistroactivoguardar.Capacidad AS Capacidad,
			tblvidautil.Descripcion AS Vida_Util,
			tblproveedores.Proveedor AS Proveedor,
			tblregistroactivoguardar.Fecha_Compra As Fecha_Compra,
			tblregistroactivoguardar.N_Factura As N_Factura,
			tblregistroactivoguardar.Costo AS Costo,
			tblregistroactivoguardar.FKUsuario_TblUsuarios AS Responsable_Save,
			tblregistroactivoguardar.Observaciones As Observaciones,
			Origen.Nombre_finca AS Finca_Origen,
			Destino.Nombre_finca AS Finca_Destino,
			tblubicacionactivos.Descripcion As Ubicacion,
			tblmovimientos.Fecha_Registro As Fecha_Registro,
			tbltipomovimiento.Descripcion As Movimiento_Naranja,
			tblmovimientos.Responsable AS Responsable

			FROM
			db_activosfijos.tblregistroactivoguardar, db_activosfijos.tbltipoactivos, db_activosfijos.tblsubtipoactivos, db_activosfijos.tblubicacionactivos,db_master.tblfincas AS Origen, db_master.tblfincas AS Destino, db_ci_tropical.tblproveedores,db_activosfijos.tblvidautil, db_activosfijos.tbltipomovimiento, db_activosfijos.tblmovimientos
			WHERE
			tbltipomovimiento.PKId = tblmovimientos.FKTipo_Movimiento AND
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			tblproveedores.PKNit = tblregistroactivoguardar.FKProveedor AND
			tblvidautil.PKId_Vidautil = tblregistroactivoguardar.FKVida_Util AND

			tbltipoactivos.PKId_tipoactivo = tblsubtipoactivos.FKTipo AND		
			tblsubtipoactivos.PKId_Subtipoactivo = tblregistroactivoguardar.FKSubtipo AND
			tblregistroactivoguardar.PKId_Activo = tblregistroactivoguardar.PKId_Activo AND
			tblregistroactivoguardar.PKId_Activo = :PKId_Activo AND
			Destino.PKCodigo = tblregistroactivoguardar.FKLocalicacion_tblFincas AND
			tblubicacionactivos.PKId_Ubicacionactivos = tblmovimientos.FKUbicacion_Activo");
		$sql->bindParam(":PKId_Activo",$datos['Codigo']);
		$sql->execute();
		return $sql;
	}
	protected function buscar_registrosespecifico_modelo($datos){
		$sql = mainModel::conectar()->prepare("SELECT 
			tblregistroactivoguardar.PKId_Activo As Codigo ,
			tblregistroactivoguardar.Nombre_Activo As Nombre_Activo,
			tbltipoactivos.Descripcion AS Tipo,
			tblsubtipoactivos.Descripcion As Subtipo,
			tblregistroactivoguardar.Serie As Serie,
			tblregistroactivoguardar.Marca As Marca,
			tblregistroactivoguardar.Modelo AS Modelo,
			tblregistroactivoguardar.Color AS Color,
			tblregistroactivoguardar.Procesador As Procesador,
			tblregistroactivoguardar.Memoria As Memoria,
			tblregistroactivoguardar.Discoduro As Disco,
			tblregistroactivoguardar.SistemaOperativo AS Sistema,
			tblregistroactivoguardar.Login AS Login,
			tblregistroactivoguardar.Capacidad As Capacidad,
			tblvidautil.Descripcion As Vida_Util,
			tblproveedores.Proveedor As Proveedor,
			tblregistroactivoguardar.Fecha_Compra As Fecha_Compra,
			tblregistroactivoguardar.N_Factura As N_Factura,
			tblregistroactivoguardar.Costo AS Costo,
			tblregistroactivoguardar.Observaciones, 
			tbltipomovimiento.Descripcion As Estado,
			tblusuarios.PKUsuario As Usuario											

			FROM
			db_activosfijos.tblubicacionactivos, db_activosfijos.tblregistroactivoguardar, db_ci_tropical.tblproveedores, db_activosfijos.tblsubtipoactivos, db_activosfijos.tbltipoactivos, db_activosfijos.tblvidautil, db_activosfijos.tbltipomovimiento,		db_master.tblfincas,db_master.tblusuarios

			WHERE
			tblsubtipoactivos.PKId_Subtipoactivo = tblregistroactivoguardar.FKSubtipo AND 
			tbltipoactivos.PKId_tipoactivo = tblsubtipoactivos.FKTipo AND 
			tblvidautil.PKId_Vidautil = tblregistroactivoguardar.FKVida_Util AND 
			tblproveedores.PKNit = tblregistroactivoguardar.FKProveedor AND 
			tbltipomovimiento.PKId = tblregistroactivoguardar.FKTipo_Movimiento  GROUP BY tblregistroactivoguardar.PKId_Activo AND tblregistroactivoguardar.PKId_Activo = :PKId_Activos");
		$sql->bindParam(":PKId_Activos",$datos['PKId_Activo']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_registrofinca_modelo($datos){
		$sql = mainModel::conectar()->prepare("SELECT
			tblmovimientos.PKId_Movimiento AS Id,
			tblregistroactivoguardar.PKId_Activo,
			tblregistroactivoguardar.Nombre_Activo,
			tblregistroactivoguardar.Marca,
			tblregistroactivoguardar.Modelo,
			tblregistroactivoguardar.Serie,
			tblregistroactivoguardar.Costo,
			tblregistroactivoguardar.Observaciones,
			tblmovimientos.Fecha_Registro As Fecha,
			tblubicacionactivos.Descripcion AS localizacion,
			Finca.Nombre_finca As Finca,
			tblmovimientos.Responsable,
            tblrazon_social.Descripcion_Razon
           
         

			FROM
            db_master.tblrazon_social,
			tblregistroactivoguardar,db_master.tblfincas Origen,db_master.tblfincas Destino, db_master.tblfincas Finca,   tblmovimientos, tbltipomovimiento, tblubicacionactivos
			WHERE
            tblrazon_social.PKNit_Razon =  tblregistroactivoguardar.FKRazon_social AND
			Finca.PKCodigo =  tblregistroactivoguardar.FKLocalicacion_tblFincas AND
			tblubicacionactivos.PKId_Ubicacionactivos = tblmovimientos.FKUbicacion_Activo AND 
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND 
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			tblregistroactivoguardar.FKLocalicacion_tblFincas = :Finca  AND 
			tbltipomovimiento.PKId = tblmovimientos.FKTipo_Movimiento AND
			tblmovimientos.FKTipo_Movimiento = 2 AND
			tblregistroactivoguardar.PKId_Activo = tblmovimientos.FKActivo ORDER BY tblmovimientos.FKUbicacion_Activo");
		$sql->bindParam(":Finca",$datos['Finca']);
		$sql->execute();
		return $sql;
	}
	protected function buscar_registrofinca_todos_modelo(){
		$sql = mainModel::conectar()->prepare("	SELECT
			tblmovimientos.PKId_Movimiento AS Id,
			tblregistroactivoguardar.PKId_Activo,
			tblregistroactivoguardar.Nombre_Activo,
			tblregistroactivoguardar.Marca,
			tblregistroactivoguardar.Modelo,
			tblregistroactivoguardar.Serie,
			tblregistroactivoguardar.Costo,
			tblregistroactivoguardar.Observaciones,
			tblmovimientos.Fecha_Registro As Fecha,
			tblubicacionactivos.Descripcion AS localizacion,
			Finca.Nombre_finca As Finca,
			tblmovimientos.Responsable,
            tblrazon_social.Descripcion_Razon


			FROM
			db_master.tblrazon_social,
			tblregistroactivoguardar,db_master.tblfincas Origen,db_master.tblfincas Destino, db_master.tblfincas Finca,   tblmovimientos, tbltipomovimiento, tblubicacionactivos
			WHERE
			tblrazon_social.PKNit_Razon =  tblregistroactivoguardar.FKRazon_social AND
			Finca.PKCodigo =  tblregistroactivoguardar.FKLocalicacion_tblFincas AND
			tblubicacionactivos.PKId_Ubicacionactivos = tblmovimientos.FKUbicacion_Activo AND 
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND 
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			
			tbltipomovimiento.PKId = tblmovimientos.FKTipo_Movimiento AND
			tblmovimientos.FKTipo_Movimiento = 2 AND
			tblregistroactivoguardar.PKId_Activo = tblmovimientos.FKActivo ORDER BY  tblregistroactivoguardar.FKLocalicacion_tblFincas");
		
		$sql->execute();
		return $sql;
	}
	protected function buscar_traslado_finca_modelo($datos){
		$sql = mainModel::conectar()->prepare("SELECT
			tblmovimientos.PKId_Movimiento,
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Activo,
			Origen.Nombre_finca As Finca_Origen,
			Destino.Nombre_finca AS Finca_Destino,
			tblmovimientos.Responsable,
			tblmovimientos.Fecha_Registro,
			tblmovimientos.Hora_Registro,
			tblubicacionactivos.Descripcion As localizacion

			FROM
			db_activosfijos.tblmovimientos, db_master.tblfincas As Origen, db_master.tblfincas As Destino, db_activosfijos.tblregistroactivoguardar, db_activosfijos.tblubicacionactivos

			WHERE
			tblubicacionactivos.PKId_Ubicacionactivos = tblmovimientos.FKUbicacion_Activo AND
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			tblmovimientos.FKTipo_Movimiento = 3 AND
			tblregistroactivoguardar.PKId_Activo = tblmovimientos.FKActivo AND
			tblregistroactivoguardar.PKId_Activo = tblmovimientos.FKActivo AND		
			tblregistroactivoguardar.FKLocalicacion_tblFincas = :Finca");
		$sql->bindParam(":Finca",$datos['Finca']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_regitrosactivos_finca_modelo($datos){
		$sql = mainModel::conectar()->prepare("	SELECT
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tblregistroactivoguardar.Marca,
			tblregistroactivoguardar.Modelo,
			tblregistroactivoguardar.Serie,
			tblregistroactivoguardar.Color
			FROM
			tblregistroactivoguardar
			WHERE
			tblregistroactivoguardar.FKLocalicacion_tblFincas = :Finca AND 
			tblregistroactivoguardar.FKTipo_Movimiento = 2");
		$sql->bindParam(":Finca",$datos['Finca']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_registrotodos_modelo($dato){
		$sql = mainModel::conectar()->prepare("SELECT
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tbltipoactivos.Descripcion As Tipo,
			tblsubtipoactivos.Descripcion As Subtipo,
			tblregistroactivoguardar.Observaciones As Observaciones,
			Origen.Nombre_finca As Finca_Origen,
			Destino.Nombre_finca AS Finca_Destino,
			tbltipomovimiento.Descripcion AS Estado,
			tblregistroactivoguardar.Serie 


			FROM

			db_activosfijos.tblregistroactivoguardar, db_activosfijos.tbltipoactivos, db_activosfijos.tblsubtipoactivos, 
			db_master.tblfincas As Origen, db_master.tblfincas AS Destino, db_master.tblfincas AS Finca_Registro, db_ci_tropical.tblproveedores,db_activosfijos.tblvidautil, db_activosfijos.tbltipomovimiento, db_activosfijos.tblmovimientos

			WHERE   
			tblregistroactivoguardar.FKUsuario_TblUsuarios = :User AND
			tbltipomovimiento.PKId = tblregistroactivoguardar.FKTipo_Movimiento AND
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			Destino.PKCodigo = tblregistroactivoguardar.FKLocalicacion_tblFincas AND
			tblproveedores.PKNit = tblregistroactivoguardar.FKProveedor AND	
			tblvidautil.PKId_Vidautil = tblregistroactivoguardar.FKVida_Util AND
			tbltipomovimiento.PKId = tblregistroactivoguardar.FKTipo_Movimiento AND
			tbltipoactivos.PKId_tipoactivo = tblsubtipoactivos.FKTipo AND
			tblsubtipoactivos.PKId_Subtipoactivo = tblregistroactivoguardar.FKSubtipo AND
			tblregistroactivoguardar.PKId_Activo = tblregistroactivoguardar.PKId_Activo AND
			tblregistroactivoguardar.FKTipo_Movimiento != 4 GROUP BY tblregistroactivoguardar.PKId_Activo");
		$sql->bindParam(":User",$dato['User']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_registrotodosfull_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tbltipoactivos.Descripcion As Tipo,
			tblsubtipoactivos.Descripcion As Subtipo,
			tblregistroactivoguardar.Observaciones As Observaciones,
			Origen.Nombre_finca As Finca_Origen,
			Destino.Nombre_finca AS Finca_Destino,
			tbltipomovimiento.Descripcion AS Estado,
			tblregistroactivoguardar.Serie 


			FROM

			db_activosfijos.tblregistroactivoguardar, db_activosfijos.tbltipoactivos, db_activosfijos.tblsubtipoactivos, 
			db_master.tblfincas As Origen, db_master.tblfincas AS Destino, db_master.tblfincas AS Finca_Registro, db_ci_tropical.tblproveedores,db_activosfijos.tblvidautil, db_activosfijos.tbltipomovimiento, db_activosfijos.tblmovimientos

			WHERE   
			tbltipomovimiento.PKId = tblregistroactivoguardar.FKTipo_Movimiento AND
			Origen.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Origen AND
			Destino.PKCodigo = tblmovimientos.FKCodigo_TblFincas_Destino AND
			Destino.PKCodigo = tblregistroactivoguardar.FKLocalicacion_tblFincas AND
			tblproveedores.PKNit = tblregistroactivoguardar.FKProveedor AND	
			tblvidautil.PKId_Vidautil = tblregistroactivoguardar.FKVida_Util AND
			tbltipomovimiento.PKId = tblregistroactivoguardar.FKTipo_Movimiento AND
			tbltipoactivos.PKId_tipoactivo = tblsubtipoactivos.FKTipo AND
			tblsubtipoactivos.PKId_Subtipoactivo = tblregistroactivoguardar.FKSubtipo AND
			tblregistroactivoguardar.PKId_Activo = tblregistroactivoguardar.PKId_Activo 
			GROUP BY tblregistroactivoguardar.PKId_Activo");
		$sql->execute();
		return $sql;
	}

	protected function Actualizar_estado_Activo($datos){
		$sql = mainModel::conectar()->prepare("UPDATE
			tblregistroactivoguardar SET FKTipo_Movimiento =:FKTipo_Movimiento, FKLocalicacion_tblFincas = :FKLocalicacion_tblFincas   WHERE PKId_Activo = :PKId_Activo");
		$sql->bindParam(":PKId_Activo",$datos['PKId_Activo']);		   
		$sql->bindParam(":FKTipo_Movimiento",$datos['FKTipo_Movimiento']);		
		$sql->bindParam(":FKLocalicacion_tblFincas",$datos['FKLocalicacion_tblFincas']);		
		$sql->execute();
		return $sql;
	}

	protected function actualizar_registro_modelo($datos){



		$sql = mainModel::conectar()->prepare("UPDATE
			tblregistroactivoguardar SET PKId_Activo = :PKId_Activo, Nombre_Activo = :Nombre_Activo, Serie = :Serie, Marca = :Marca, Modelo = :Modelo, Color = :Color, Procesador = :Procesador, Memoria = :Memoria, Discoduro = :Discoduro, SistemaOperativo = :SistemaOperativo, Login = :Login, Capacidad = :Capacidad, Observaciones = :Observaciones WHERE PKId_Activo = :PKId_Activo");
		$sql->bindParam(":PKId_Activo",$datos['PKId_Activo']);
		$sql->bindParam(":Nombre_Activo",$datos['Nombre_Activo']);
		$sql->bindParam(":Serie",$datos['Serie']);
		$sql->bindParam(":Marca",$datos['Marca']);
		$sql->bindParam(":Modelo",$datos['Modelo']);
		$sql->bindParam(":Color",$datos['Color']);		
		$sql->bindParam(":Procesador",$datos['Procesador']);		
		$sql->bindParam(":Memoria",$datos['Memoria']);		
		$sql->bindParam(":Discoduro",$datos['Discoduro']);		
		$sql->bindParam(":SistemaOperativo",$datos['SistemaOperativo']);		
		$sql->bindParam(":Login",$datos['Login']);		
		$sql->bindParam(":Capacidad",$datos['Capacidad']);	    
		$sql->bindParam(":Observaciones",$datos['Observaciones']);		

		$sql->execute();
		return $sql;
		
	}

	protected function guardardetalle_registros_modelo($datos){	
		
		$finca = $datos['FKFinca'];
		$codigoproducto = $datos['FKActivo'];		
		$ubicacionactivo = $datos['FKUbicacion_Activo'];
		$responsable = $datos['Responsable'];
		$fecha = $datos['Fecha_Asignacion'];
		$tipomovimiento = $datos['FKTipo_Movimiento'];		
		$sql = mainModel::conectar()->prepare("INSERT INTO tblasignacionactivos (PKId_Asignacion, FKActivo, FKFinca, FKUbicacion_Activo, Responsable, Fecha_Asignacion, FKTipo_Movimiento) VALUES (NULL,:FKActivo,:FKFinca,:FKUbicacion_Activo,:Responsable,:Fecha_Asignacion,:FKTipo_Movimiento)");
		$sql->bindParam(":FKFinca",$finca);
		$sql->bindParam(":FKActivo",$codigoproducto);
		$sql->bindParam(":FKUbicacion_Activo",$ubicacionactivo);
		$sql->bindParam(":Responsable",$responsable);
		$sql->bindParam(":Fecha_Asignacion",$fecha);			 		
		$sql->bindParam(":FKTipo_Movimiento",$tipomovimiento);		
		$sql->execute();
		return $sql;
	}

	protected function buscar_fincas_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT					
			tblfincas.PKCodigo,
			tblfincas.Nombre_finca
			FROM
			db_master.tblfincas
			WHERE
			tblfincas.PKCodigo = tblfincas.PKCodigo AND tblfincas.Estado = 1");
		$sql->execute();
		return $sql;
	}

}


