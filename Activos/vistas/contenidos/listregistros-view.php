<?php 
require './controladores/registrosControlador.php';
$clase_registro = new registrosControlador();
$finca = $clase_registro->buscar_fincas_controlador();
?>
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
   <div class="page-title">
    <h1><i class="fa fa-list"></i> Activos Por Fincas</h1>
  </div>
</div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
   <ol class="breadcrumb text-right">
    <li><a href="#">Principal</a></li>
    <li><a href="#">Asignar  Activos</a></li>
    <li class="active">Activos Por Fincas</li>
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
       <div class="form-grupo">
        <div class="input-group">
         <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
         <select name="cmbfincafinca_exportar" class="form-control" id="cmbfinca">
           <option value="0">Seleccione la finca</option>
           <?php foreach ($finca as $f): ?>
             <option value="<?php echo $f['PKCodigo'] ?>"><?php echo $f['Nombre_finca']; ?></option>
           <?php endforeach ?>
         </select>
       </div>
     </div>                       
     <div  id="tablaactivosfinca">                            
     </div>                                              
   </div>                        
 </div>
</div>
</div>    
</div>    
</div>    
</div>    
<div style="margin-left: 488px;">
  <a class="btn btn-info" href="<?php echo(SERVERURL) ?>exportarexcelingresos-view.php">Exportar</a>
</div>
