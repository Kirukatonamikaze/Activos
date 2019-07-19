<?php

if ($peticionAJAX){
	require '../core/mainModel.php';
}else{
	require './core/mainModel.php';
}

class loginControlador extends mainModel
{
	public function cerrar_sesionusuario_controlador(){	
		session_start();
		session_destroy();
		$url = "http://192.168.0.108/Login/index.php";
		return $url_location = '<script> window.location.href="'.$url.'" </script>';
	}
}