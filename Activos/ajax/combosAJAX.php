<?php 
	$peticionAJAX = true;
	require_once '../core/configGeneral.php';
	if (isset($_POST['cmbfinca']) || isset($_POST['cmbgrupo_asignado']) || isset($_POST['cmbtipo_elegido'])){
		require_once '../controladores/combosControlador.php';
		$combo = new combosControlador();
		if (isset($_POST['cmbgrupo_asignado'])){
			$datos = $combo->buscar_grupoespecifico_controlador();
			echo json_encode($datos);	
		}
		if (isset($_POST['cmbtipo_elegido'])){
			$subtipo = $combo->buscar_subtipoactivoespecifico_controlador();
			echo json_encode($subtipo);
		}
		if (isset($_POST['cmbfinca'])){
			$subtipo = $combo->buscar_datos_trabajador_finca_controlador();
			echo json_encode($subtipo);
		}
	}else{
		echo '<script> window.location.href="'.SERVERURL.'home/" </script>';
	}