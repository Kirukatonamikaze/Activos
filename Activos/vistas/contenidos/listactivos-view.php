<?php 
if (isset($_SESSION['usuario'])) { 

    require './controladores/registrosControlador.php';
    $clase_registro = new registrosControlador();
    $registros = $clase_registro->buscar_registrotodos_controlador();

 } 
  else{

    echo '<script> window.location.href="http://localhost/login/" </script>';
  }

?>
                <div class="breadcrumbs">
                 <div class="col-sm-4">
                  <div class="page-header float-left">
                    <div class="page-title">
                      <h1><i class="fa fa-list"></i> Activos Fijos </h1>
                    </div>
                   </div>
                  </div>
                   <div class="col-sm-8">
                   <div class="page-header float-right">
                    <div class="page-title">
                     <ol class="breadcrumb text-right">
                        <li><a href="#">Principal</a></li>
                        <li><a href="#">Registrar Activos</a></li>
                        <li class="active">Listado Activos</li>
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
                            <th>Código</th>                             
                            <th>Nombre</th> 
                            <th>Subtipo</th>
                            <th>Serie</th> 
                            <th>Estado</th>
                            <th>Ubicación</th>
                            <th><center>Opciones</center></th>
                            </tr>
                         </thead>
                          <tbody>
                           <?php foreach ($registros as $r): ?>
                             <tr>
                                <td><?php echo $r['Codigo']; ?></td>                           
                                <td><?php echo $r['Nombre']; ?></td> 
                                <td><?php echo $r['Subtipo']; ?></td>
                                <td><?php echo $r['Serie']; ?></td>                         
                                <td><?php echo $r['Estado']?></td>
                                <td><?php echo $r['Finca_Destino']; ?></td>
                                <td> 
                            <center>
                             <a href="<?php echo SERVERURL; ?>detalleactivos/<?php echo mainModel::encryption($r['Codigo']); ?>/" style="border-radius: 5px;" class="btn  fa fa-list-alt "> Detalle</a>
                            </center> 
                           </td>
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

