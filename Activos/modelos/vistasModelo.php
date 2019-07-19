<?php 

	/**
	 * 
	 */
	class vistasModelo
	{
		protected function obtener_vistas_modelo($vistas)
		{
			$Lista_Blanca = ["home","savesolicitud","listtraslados","listproveedores","saveproveedores","bajaractivos","listsolicitud","detalleactivos","historialderegistros","editaractivos","trasladaractivo","saveregistrofinca","listactivos","comprobante","listregistros","historyreg"];
			if (in_array($vistas, $Lista_Blanca)){
				$url = "./vistas/contenidos/".$vistas."-view.php";
				if (is_file($url)){
					$contenido = $url;
				}else{
					$contenido = "home";
				}
			}elseif ($vistas == "home"){
				$contenido = "home";
			}elseif ($vistas == "index"){
				$contenido = "home";
			}else{
				$contenido = "404";
			}
			return $contenido;
		}
	}