<?php 
session_start();
$datos = $_SESSION['activos_fincas'];

?>
<div style="margin-top: 20px;" class="table table-responsive">
  <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
   <thead>
    <tr>
      <th>Código</th>       
      <th>Activo</th>       
      <th>Finca Origen</th> 
      <th>Responsable</th>
      <th>Fecha Traslado</th>                                     
      <th>Hora Traslado</th>        
      <th>Ubicación</th>   
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $c): ?>
      <tr>
        <td><?php echo $c['Codigo']; ?></td>
        <td><?php echo $c['Activo']; ?></td>
        <td><?php echo $c['Finca_Origen']; ?></td>
        <td><?php echo $c['Responsable']; ?></td>
        <td><?php echo $c['Fecha_Registro']; ?></td>
        <td><?php echo $c['Hora_Registro']; ?></td>     
        <td><?php echo $c['localizacion']; ?></td>
      </tr>    
    <?php endforeach ?>
  </tbody>
</table>
</div>