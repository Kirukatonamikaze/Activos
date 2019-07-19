<?php

if ($peticionAJAX){
	require '../modelos/combosModelo.php';
}else{
	require './modelos/combosModelo.php';
}

class combosControlador extends combosModelo
{


	public function buscar_tipoactivo_controlador(){
		$datos = combosModelo::buscar_tipoactivo_modelo()->fetchAll();
		return $datos;
	}	
	public function buscar_sociedad_controlador(){
		$datos = combosModelo::buscar_sociedad_modelo()->fetchAll();
		return $datos;
	}	

	public function buscar_listado_proveedor_controlador(){
		$datos = combosModelo::buscar_listado_proveedor_modelo()->fetchAll();
		return $datos;
	}	

	public function buscar_oficios_controlador(){
		$datos = combosModelo::buscar_oficios_modelo()->fetchAll();
		return $datos;
	}
	public function buscar_subtipoactivo_controlador(){
		$datos = combosModelo::buscar_subtipoactivo_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_fincas_controlador(){
		$datos = combosModelo::buscar_fincas_modelo()->fetchAll();
		return $datos;
	}	
	public function buscar_proveedor_controlador(){
		$datos = combosModelo::buscar_proveedor_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_ubicacion_controlador(){
		$datos = combosModelo::buscar_ubicacion_modelo()->fetchAll();
		return $datos;
	}
	public function buscar_vidautil_controlador(){
		$datos = combosModelo::buscar_vidautil_modelo()->fetchAll();
		return $datos;
	}


	public function buscar_grupoespecifico_controlador(){
		$codigo_grupo = mainModel::limpiar_cadena($_POST['cmbgrupo_asignado']);
		$datos_grupo = [
			"Grupo"=>$codigo_grupo
		];
		$datos = combosModelo::buscar_grupoespecifico_modelo($datos_grupo)->fetch();
		return $datos;
	}

	public function buscar_tiposolicitud_controlador(){
		$datos = combosModelo::buscar_tiposolicitud_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_prioridad_controlador(){
		$datos = combosModelo::buscar_prioridad_modelo()->fetchAll();
		return $datos;
	}

	public function buscar_subtipoactivoespecifico_controlador(){
		$cmbtipo = mainModel::limpiar_cadena($_POST['cmbtipo_elegido']);
		$datos_grupo = [
			"Tipo"=>$cmbtipo
		];
		$datos = combosModelo::buscar_subtipoactivoespecifico_modelo($datos_grupo)->fetchAll();
		return $datos;
	}
	public function buscar_registrotodos_controlador(){
		$datos = combosModelo::buscar_registrotodos_modelo()->fetchAll();
		return $datos;
	}
	public function buscar_activos_asginados_controlador(){
		$user = $_SESSION['usuario']->PKUsuario;

		$dato = [
			"User"=>$user
		];		
		$datos = combosModelo::buscar_activos_asginados_modelo($dato)->fetchAll();
		return $datos;
	}

	public function buscar_datos_trabajador_finca_controlador(){
		$txtnombre_finca = mainModel::limpiar_cadena($_POST['cmbfinca']);
		if ($txtnombre_finca == 'CEIBA') {
			$txtnombre_finca = 'LA CEIBA';
		}
		$datos_trabajador = [
			"Finca"=>$txtnombre_finca
		];
		$datos = combosModelo::buscar_datos_trabajador_finca_modelo($datos_trabajador)->fetch();
		return $datos;
	}
}