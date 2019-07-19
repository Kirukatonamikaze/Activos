<?php 
	$peticionAJAX = true;
	require_once '../core/configGeneral.php';
	if (isset($_POST['cmbfincatraslado1']) ||isset($_POST['txtnit_proveedor']) ||isset($_POST['txtcodigoproducto_baja']) ||isset($_POST['txtdocumento_reponsablebajarecibe']) ||isset($_POST['txtdocumentoresponsable']) ||isset($_POST['txtcodigoproducto_addtraslado']) ||isset($_POST['txtcodigoproducto_addtraslado']) ||isset($_POST['txtcancelar']) ||isset($_POST['btn-eliminarsesion']) ||isset($_POST['txtdocumento_reponsable_asignacion']) || isset($_POST['txtcodigoproducto_reg']) || isset($_POST['txtdocumento_reponsabletrasladorecibe'])|| isset($_POST['txtcodigoproducto_up']) || isset($_POST['txtcodigoproducto_add']) || isset($_POST['txtdocumento_reponsable']) || isset($_POST['cmbfinca_opcion']) || isset($_POST['pos'])){
		require_once '../controladores/registrosControlador.php';
		$registro = new registrosControlador();			
		if (isset($_POST['txtcodigoproducto_reg'])){			
		
			echo $registro->guardar_registro_controlador();
		}
		if (isset($_POST['txtcodigoproducto_up'])){
			echo $registro->Actualizar_registro_controlador();
		}
		if (isset($_POST['txtnit_proveedor'])){
			
			echo $registro->guardar_proveedor_controlador();
		}
		if (isset($_POST['btn-eliminarsesion'])){			

			echo $registro->Cancelar_Registro();
		}
		if (isset($_POST['txtcodigoproducto_add'])) {
			$registro->agregar_productos_controlador();		
		}
		if (isset($_POST['txtcodigoproducto_baja'])) {
			//$registro->agregar_productos_controlador3();		
		}	
		if (isset($_POST['txtcodigoproducto_addtraslado'])) {
			$registro->agregar_productos_controlador2();		
		}	
		if (isset($_POST['txtdocumentoresponsable'])) {
			$datos = $registro->buscar_responsable_controlador();
			echo json_encode($datos);		
		}	
		if (isset($_POST['txtdocumento_reponsable'])) {
			echo $registro->guardardetalle_registros_controlador();
		}
		if (isset($_POST['txtcancelar'])) {
			echo $registro->cancelar_traslado_controlador();
		}
		if (isset($_POST['txtdocumento_reponsablebajarecibe'])) {
			echo $registro->realizar_baja_controlador();
		}
		if (isset($_POST['txtdocumento_reponsabletrasladorecibe'])) {		
		echo $registro->guardartraslado_registros_controlador();
				
		}if (isset($_POST['txtdocumento_reponsable_asignacion'])) {
			echo $registro->guardarasignacion_registros_controlador();		
		}
		if (isset($_POST['cmbfinca_opcion'])) {			
			$datostabla = $registro->buscar_regitrosactivos_controlador();
			echo json_encode($datostabla);
		}
		if (isset($_POST['cmbfincatraslado1'])) {
			
			$datostabla = $registro->buscar_traslado_finca_controlador();
			echo json_encode($datostabla);
		}
		if (isset($_POST['pos'])) {
			
			$datostabla = $registro->buscar_regitrosactivos_finca_controlador();
			echo $datostabla;
		}
		
	}else{

	echo '<script> window.location.href="http://localhost/login/" </script>';
	}
?>	