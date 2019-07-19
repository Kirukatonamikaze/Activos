<?php 
	
	require_once 'core/configGeneral.php';
	include_once 'controladores/vistasControlador.php';

	$plantilla = new vistasControlador();
	$plantilla->obtener_plantilla_controlador();