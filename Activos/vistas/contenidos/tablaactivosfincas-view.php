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
      <th>Marca</th> 
      <th>Modelo</th>
      <th>Serie</th>                                     
      <th>Costo</th>                                     
      <th>Observaciones</th>
      <th>Fecha Asignacion</th>
      <th>Ubicación</th>   
      <th>Responsable</th>   
      <th>Finca</th>   
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $c): ?>
      <tr>
        <td><?php echo $c['PKId_Activo']; ?></td>
        <td><?php echo $c['Nombre_Activo']; ?></td>
        <td><?php echo $c['Marca']; ?></td>
        <td><?php echo $c['Modelo']; ?></td>
        <td><?php echo $c['Serie']; ?></td>
        <td><?php echo $c['Costo']; ?></td>
        <td><?php echo $c['Observaciones']; ?></td>
        <td><?php echo $c['Fecha']; ?></td>
        <td><?php echo $c['localizacion']; ?></td>
        <td><?php echo $c['Responsable']; ?></td>
        <td><?php echo $c['Finca']; ?></td>
      </tr>    
    <?php endforeach ?>
  </tbody>
</table>
</div>