<?php 
require './controladores/registrosControlador.php';
$clase_registro = new registrosControlador();
$registros = $clase_registro->buscar_registrotodos_controlador();
$item = 1;
?>
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
   <div class="page-title">
    <h1><i class="fa fa-list"></i> Mis Requerimientos</h1>
  </div>
</div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
   <ol class="breadcrumb text-right">
    <li><a href="#">Principal</a></li>
    <li><a href="#">Mis Requerimientos</a></li>
    <li class="active">Solicitudes Realizadas</li>
  </ol>
</div>
</div>
</div>
</div>
<div style=" width: 98%">
 <div class="animated fadeIn">
  <div class="row">
   <div class="col-md-12">
    <div class="card">
     <div class="card-header">
      <strong class="card-title">Listado con todos los requerimientos realizados.</strong>
    </div>
    <div class="card-body">
     <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
      <thead>
       <tr>
        <th>#</th>
        <th>Solicitante</th>
        <th>Fecha Solicitacion</th>
        <th>Hora Solicitacion</th>
        <th>Asunto</th>
        <th>Estado</th>
        <th><center>Opciones</center></th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($registros as $r): ?>
      <tr>
        <td><center><?php echo $item; ?></center></td>
        <td><?php echo $r['PKUsuario']; ?></td>
        <td><?php echo $r['Fecha_Registro']; ?></td>
        <td><?php echo $r['Hora_Registro']; ?></td>
        <td><?php echo $r['Asunto_Solicitud']; ?></td>
        <td>
         <?php if ($r['Descripcion_Estado'] == 'Asignado'){ ?>
          <div class="progress mb-2">
           <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"><strong><?php echo $r['Descripcion_Estado']; ?></strong></div>
         </div>
       <?php }elseif ($r['Descripcion_Estado'] == 'En Proceso'){ ?>
        <div class="progress mb-2">
         <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"><strong><?php echo $r['Descripcion_Estado']; ?></strong></div>
       </div>
     <?php }elseif ($r['Descripcion_Estado'] == 'Pendiente'){?>
      <div class="progress mb-2">
        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"><strong><?php echo $r['Descripcion_Estado']; ?></strong></div>
      </div>
    <?php } ?>
  </td>
  <td>
   <center>
    <a style="border-radius: 5px;" class="btn btn-primary" href="<?php echo SERVERURL ?>detailsolicitud/<?php echo mainModel::encryption($r['PKId_Solicitud']); ?>/"><i class="fa fa-tasks"></i> </a>
  </center>
</td>
</tr>
<?php $item = $item + 1; endforeach ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>    