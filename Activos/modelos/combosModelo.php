<?php

if ($peticionAJAX){
	require '../core/mainModel.php';
}else{
	require './core/mainModel.php';
}
class combosModelo extends mainModel
{

	protected function buscar_oficios_modelo(){
		$sql = mainModel::conectarsqlsrv()->prepare("SELECT
			* FROM tblOficio");
		$sql->execute();
		return $sql;
	}

	protected function buscar_tipoactivo_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT 
			tbltipoactivos.PKId_tipoactivo,
			tbltipoactivos.Descripcion
			FROM
			tbltipoactivos
			WHERE 
			tbltipoactivos.PKId_tipoactivo = tbltipoactivos.PKId_tipoactivo");
		$sql->execute();
		return $sql;
	}
	protected function buscar_sociedad_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT 
			tblrazon_social.PKNit_Razon,
			tblrazon_social.Descripcion_Razon
			FROM
			db_master.tblrazon_social");
		$sql->execute();
		return $sql;
	}
	protected function buscar_listado_proveedor_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tblproveedores.PKNit,
			tblproveedores.Proveedor,
			tbldetalle_proveedor.Razon_Social,   
			tbldetalle_proveedor.Direccion,
			tbldetalle_proveedor.Ciudad,
			tblproveedores.Estado,
			tbltipo_proveedor.Descripcion As Tipo,
			tbldetalle_proveedor.Telefono

			FROM
			db_ci_tropical.tblproveedores, db_ci_tropical.tbltipo_proveedor, db_ci_tropical.tbldetalle_proveedor
			WHERE
			tblproveedores.PKNit = tbldetalle_proveedor.FKNit AND
			db_ci_tropical.tbltipo_proveedor.PKId = tblproveedores.FKArea AND
			tblproveedores.PKNit = tblproveedores.PKNit
			AND
			tblproveedores.FKArea != 1");
		$sql->execute();
		return $sql;
	}

	protected function buscar_subtipoactivo_modelo(){	
		$sql = mainModel::conectar()->prepare("SELECT 
			tblsubtipoactivos.PKId_Subtipoactivo,
			tblsubtipoactivos.Descripcion
			FROM
			tblsubtipoactivos
			WHERE 
			tblsubtipoactivos.PKId_Subtipoactivo = 		tblsubtipoactivos.PKId_Subtipoactivo");
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
			tblfincas.PKCodigo = tblfincas.PKCodigo AND tblfincas.Estado = 1 ");
		$sql->execute();
		return $sql;
	}
	protected function buscar_proveedor_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tblproveedores.PKNit,
			tblproveedores.Proveedor
			FROM
			db_ci_tropical.tblproveedores
			WHERE
			tblproveedores.PKNit = tblproveedores.PKNit
			AND
			tblproveedores.FKArea != 1");
		$sql->execute();
		return $sql;
	}
	protected function buscar_vidautil_modelo(){	
		$sql = mainModel::conectar()->prepare("SELECT 
			tblvidautil.PKId_Vidautil,
			tblvidautil.Descripcion
			FROM
			tblvidautil
			WHERE
			tblvidautil.PKId_Vidautil = tblvidautil.PKId_Vidautil");
		$sql->execute();
		return $sql;
	}

	protected function buscar_ubicacion_modelo(){	
		$sql = mainModel::conectar()->prepare("SELECT
			tblubicacionactivos.PKId_Ubicacionactivos,
			tblubicacionactivos.Descripcion
			FROM
			db_activosfijos.tblubicacionactivos
			WHERE
			tblubicacionactivos.PKId_Ubicacionactivos = tblubicacionactivos.PKId_Ubicacionactivos");
		$sql->execute();
		return $sql;
	}

	protected function buscar_subtipoactivoespecifico_modelo($datos){	
		$sql = mainModel::conectar()->prepare("SELECT 
			tblsubtipoactivos.PKId_Subtipoactivo,
			tblsubtipoactivos.Descripcion
			FROM
			tblsubtipoactivos, tbltipoactivos	
			WHERE 
			tbltipoactivos.PKId_tipoactivo = tblsubtipoactivos.FKTipo AND
			tblsubtipoactivos.FKTipo = :Tipo");
		$sql->bindParam(":Tipo",$datos['Tipo']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_grupoespecifico_modelo($datos){
		$sql = mainModel::conectar()->prepare("SELECT
			tblgrupos.PKId_Grupo,
			tblgrupos.Nombre_Grupo,
			tblgrupos.Telefono_Grupo,
			tblgrupos.Correo_Grupo
			FROM
			tblgrupos, db_master.tblestado_usuario
			WHERE
			tblestado_usuario.PKId = tblgrupos.FKId_TblEstados AND
			tblgrupos.PKId_Grupo = :Grupo");
		$sql->bindParam(":Grupo",$datos['Grupo']);
		$sql->execute();
		return $sql;
	}

	protected function buscar_tiposolicitud_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tbltipo_solicitud.PKId_Tipo,
			tbltipo_solicitud.Descripcion_Tipo
			FROM
			tbltipo_solicitud");
		$sql->execute();
		return $sql;
	}

	protected function buscar_prioridad_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tblprioridad.PKId_Prioridad,
			tblprioridad.Descripcion_Prioridad
			FROM
			tblprioridad");
		$sql->execute();
		return $sql;
	}
	protected function buscar_activos_asginados_modelo($dato){
		$sql = mainModel::conectar()->prepare("SELECT
			
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tblregistroactivoguardar.Serie As Serie,
			tblregistroactivoguardar.Modelo As Modelo,
			tblregistroactivoguardar.Marca AS Marca,
			tblregistroactivoguardar.Color AS Color
			FROM
			db_activosfijos.tblregistroactivoguardar
			WHERE 
			tblregistroactivoguardar.FKUsuario_TblUsuarios = :User AND 
			tblregistroactivoguardar.FKTipo_Movimiento = 1");
		$sql->bindParam(":User",$dato['User']);
		$sql->execute();
		return $sql;
	}protected function buscar_registrotodos_modelo(){
		$sql = mainModel::conectar()->prepare("SELECT
			tblregistroactivoguardar.PKId_Activo AS Codigo,
			tblregistroactivoguardar.Nombre_Activo AS Nombre,
			tblregistroactivoguardar.Serie As Serie,
			tblregistroactivoguardar.Modelo AS Modelo,
			tblregistroactivoguardar.Marca As Marca, 
			tblregistroactivoguardar.color As Color
			FROM
			db_activosfijos.tblregistroactivoguardar
			WHERE   
			tblregistroactivoguardar.FKUsuario_TblUsuarios = 'Kirukato' AND

			tblregistroactivoguardar.FKTipo_Movimiento = 1");
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

	protected function buscar_datos_trabajador_finca_modelo($datos){
		$sql = mainModel::conectarsqlsrv()->prepare("SELECT		
			tblTrabajador.strDocumento,
			tblTrabajador.strApellido1,							
			tblTrabajador.strNombre1,	
			tblOficio.strNombre AS Cargo
			FROM
			tblTrabajador, tblSucursal, tblCompania, tblOficio
			WHERE
			tblCompania.idCompania = tblSucursal.idCompania AND
			tblOficio.idOficio = tblTrabajador.idOficio AND
			tblSucursal.idSucursal = tblTrabajador.idSucursal AND	
			tblTrabajador.strEstadoTrabajador = 'Activo' AND
			tblOficio.strNombre = 'ADMINISTRADOR FINCA' AND
			tblSucursal.strNombre = :Finca");
		$sql->bindParam(":Finca",$datos['Finca']);
		$sql->execute();
		return $sql;
		$sql->close();
	}

	
}
?>	