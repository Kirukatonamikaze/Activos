<?php 
if (isset($_SESSION)) { 

  require './controladores/combosControlador.php';
  $clase_combo = new combosControlador();
  $proveedores = $clase_combo->buscar_listado_proveedor_controlador();

} 

?>
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
    <div class="page-title">
      <h1><i class="fa fa-list"></i> Listado Proveedores</h1>
    </div>
  </div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
   <ol class="breadcrumb text-right">
    <li><a href="#">Principal</a></li>
    <li><a href="#">Proveedores</a></li>
    <li class="active">Listado Proveedores</li>
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
      <div class="card-body">
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
         <thead>
          <tr>
            <th>Nit</th>                             
            <th>Nombre</th> 
            <th>Razón social</th> 
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Area</th>
            <th>Telefono</th>                        
            <th>Estado</th> 
          </tr>
        </thead>
        <tbody>
         <?php foreach ($proveedores as $r): ?>
           <tr>
            <td><?php echo $r['PKNit']; ?></td>                           
            <td><?php echo $r['Proveedor']; ?></td> 
            <td><?php echo $r['Razon_Social']; ?></td> 
            <td><?php echo $r['Direccion']; ?></td> 
            <td><?php echo $r['Ciudad']; ?></td> 
            <td><?php echo $r['Tipo']; ?></td>
            <td><?php echo $r['Telefono']?></td>
            <td><?php echo $r['Estado']; ?></td>                      
          </tr>
        <?php  endforeach ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
</div>    

