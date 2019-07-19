<?php 
	$peticionAJAX = true;
	require_once '../core/configGeneral.php';
	if (isset($_POST['txtcerrarsesion'])){
		require_once '../controladores/loginControlador.php';
		$login = new loginControlador();
		if (isset($_POST['txtcerrarsesion'])){
			echo $login->cerrar_sesionusuario_controlador();
		}
	}else{
		echo '<script> window.location.href="'.SERVERURL.'index/" </script>';
	}