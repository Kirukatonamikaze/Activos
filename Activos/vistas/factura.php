<?php 
  require_once './controladores/registrosControlador.php';
  $mostrar_datos = new registrosControlador();
    $n_registro = explode("/",$_GET['views']);
  $datos_informes = $mostrar_datos->buscar_registrosespecifico_controlador_detalle($n_registro[1])->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/factura.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<table style="width: 50%; margin-left: 25%; margin-right: 25%; margin-top: 2%;" class="table table-bordered">
		<thead>
			<tr>
				<td colspan="9">
					<center><h3>C.I. TROPICAL</h3></center>
				Nit: : 900317522-1 			
				<span style='display:inline; white-space:pre;'>	</span>   
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				 Factura N°: <?php echo($sql['PKId']) ?>
				 <br>
				 Dirección: calle 98 N°104-12 barrio Ortíz
			    <span style='display:inline; white-space:pre;'></span>   
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 	
			     Fecha: <?php echo($sql['Fecha']) ?>
				 <br>
				 Telefono: 8280435
			    <span style='display:inline; white-space:pre;'></span>   
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 	
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				<span style='display:inline; white-space:pre;'>	</span> 
				Hora: <?php echo($sql['Hora']) ?>
				<br>
				<br>
		 		<!--<center>Apartadó  Antioquia Colombia</center> -->
				</td>
			</tr>
			<tr>
				<td>

					<center><h4>Cliente</h4></center>
				Nombres:
				 &nbsp; 
				<?php echo($sql['Nombres']) ?>
				<br>
				Apellidos:
				 &nbsp; 
				<?php echo($sql['Apellidos']) ?>
				<br>
				Telefono:
				 &nbsp; 
				<?php echo($sql['Telefono']) ?>
				<br>
				Direccion:
				 &nbsp; 
				<?php echo($sql['Direccion']) ?>
				<br>
				Correo:
				 &nbsp; 
				<?php echo($sql['Correo']) ?>
				<br>
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
						<center><h4>Artículo</h4> </center>
				 Marca del dispositivo:
				 &nbsp; 
				<?php echo($sql['Descripcion']) ?>
				<br>
				Modelo del dispositivo:
				 &nbsp; 
				<?php echo($sql['Modelo']) ?>
				<br>
				Daño:
				 &nbsp; 
				<?php echo($sql['Danio']) ?>
				<br>
				Observaciones:
				 &nbsp; 
				<?php echo($sql['Observaciones']) ?>
				<br>
				Precio:
				 &nbsp; 
				<?php echo($sql['Precio']) ?>
				</td>
			</tr>
			<tr>
				<td>
				<center><h4>CONDICIONES DEL USUARIO:</h4> </center>
				<br>
				<p align="justify"> 1. me comprometo a cancelar los costos generados por el servicio técnico.</p>			 
				<p align="justify"> 2. Si el equipo se encuentra no reparable o no autorizo su reparación, me comprometo a cancelar la tarifa del diagnostico.</p>
				<p align="justify"> 3. Una vez sea notificado que puedo recoger mi equipo, dispondré de 30 días calendario para recogerlo.</p>
				<p align="justify"> 4.A partir del día 31 se cobrará la tarifa de bodegaje. </p>
				<p align="justify">5.Si para el día 91 no se ha recogido el equipo se proseguirá conforme a lo establecido en el Código de Procedimiento Civil y la Superintendencia de Industria y Comercio.</p>
		
				
				 
				  
				

			
				
				
			 </td>
			</tr>
		</tbody>
	</table>
</body>
</html>
<script type="text/javascript">
	window.print();
	self.close();

</script>