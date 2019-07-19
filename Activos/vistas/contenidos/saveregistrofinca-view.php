
<?php

if (isset($_SESSION['usuario'])) {    
  require './controladores/combosControlador.php';
  $clase_combo = new combosControlador();
  $finca = $clase_combo->buscar_fincas_controlador();
  $ubicacion = $clase_combo->buscar_ubicacion_controlador();
  $vidautil = $clase_combo->buscar_vidautil_controlador();
  $proveedor = $clase_combo->buscar_proveedor_controlador();
  $registros = $clase_combo->buscar_activos_asginados_controlador();
} 
else{

  echo '<script> window.location.href="http://localhost/login/" </script>';
}
?>
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
   <div class="page-title">
    <h1><i class="menu-icon fa fa-bell"></i> Asignar Activos /<small>Realizar registro</small></h1>
  </div>
</div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
    <ol class="breadcrumb text-right">
      <li><a href="#">Principal</a></li>
      <li><a href="#">Asignar Activos</a></li>
      <li class="active">Realizar Registro</li>
    </ol>
  </div>
</div>
</div>
</div>
<div >
 <div class="animated fadeIn">
  <div class="row">
   <div class="col-sm-12">
    <div class="card" style="padding: 20px;"> 
      <form action="<?php echo(SERVERURL); ?>ajax/registrosAJAX.php" method="post" data-form="search" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">

       <div class="col-md-12">
        <label> <h6>Finca Destino</h6> <strong style="color: black;"></strong></label>
        <div class="form-grupo">
         <div class="input-group">
           <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
           <select name="txtcodigo_finca_add" class="form-control" id="cmbfinca11">
            <option value="0">Seleccione la finca</option>
            <?php foreach ($finca as $f): ?>
              <option value="<?php echo $f['PKCodigo'] ?>"><?php echo $f['Nombre_finca']; ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>                                

    <!-- Formulario sin cargar las fincas-->  

    <div style="margin-top: 35px;" class="col-md-12" id="cargaractivos1">         
     <div class="col-md-4">
       <div class="form-group">
        <label><h6>Activo</h6></label>
        <div class="input-group">                        
         <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
         <input id="txtcodigoproducto_add"  required="" name="txtcodigoproducto_add"  class="form-control" placeholder="Ingrese el producto" ><a  class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></a>
       </div>
     </div>
   </div> 
   <div class="col-md-4">
    <div class="form-group">
     <label><h6>Nombre</h6></label>
     <div class="input-group">
      <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
      <input id="txtnombreproducto_add"  required="" readonly="readonly" name="txtnombreproducto_add"  class="form-control" placeholder="Nombre del producto" >
    </div>
  </div>
</div>   
<div class="col-md-4">
 <label> <h6>Ubicación</h6> <strong style="color: black;"></strong></label>
 <div class="form-grupo">
   <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
     <select name="cmbubicacionproducto" class="form-control" id="cmbtipo">
      <option value="0">Seleccione la ubicación</option>
      <?php foreach ($ubicacion as $u): ?>
        <option  value="<?php echo $u['PKId_Ubicacionactivos'] ?>"><?php echo $u['Descripcion']; ?></option>
      <?php endforeach ?>
    </select><a id="btnagregaractivo" class="btn btn-info"><i class="fa fa-plus"></i></a>
  </div>
</div>
</div>           
</div>   
<div id="tabla_activos">
</div>                         
<div style="margin-top: 40px;" class="col-sm-12">                                   
 <div class="col-md-4">
  <label> <h6>Responsable Entrega</h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-user"></i></div>
     <input   required="" readonly="readonly" name="txtdocumento_reponsable_asignacion"  class="form-control" placeholder="<?php echo $_SESSION['usuario']->PKUsuario ?>" >
   </div>
 </div>
</div> 
<div class="col-md-4">
  <label> <h6>Documento Responsable </h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
     <input  required="" id="txtdocumentoresponsable"   name="txtdocumento_reponsable_asignacion"  class="form-control" placeholder="Documento responsable recibe asignación " >
   </div>
 </div>
</div> 
<div class="col-md-4">
  <label> <h6>Nombre Responsable </h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-male"></i></div>
     <input  readonly="readonly"  id="txtnombre_reponsable_asignacion" name="txtnombre_reponsable_asignacion"  class="form-control" placeholder="Nombre  responsable recibe asignación " >
   </div>
 </div>
</div>      
</div>  

<div class="col-md-12" style="margin-top: 30px;">
 <button style="border-radius: 5px; margin-left: 450px; " type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp; Asignar Activo</button>
</div>                               
<div class="RespuestaAJAX">                            
</div>                  
</form>  
<div style="display: flex;  margin-top: -36px; margin-left: 650px; ">
  <form action="<?php echo(SERVERURL); ?>ajax/registrosAJAX.php" method="post" data-form="delete" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">

    <input type="hidden" value="xxxx" name="btn-eliminarsesion">
    <center><button style="border-radius: 5px;" type="submit" class="btn btn-danger"> <i class=" fa fa-times"> </i> Cancelar Registro</button></center>
    <div class="RespuestaAJAX">                            
    </div> 
  </form>  
</div>
</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content --> 

<div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
   <div class="modal-content">
    <div  class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
      <div class="modal-header">
       <center><h5 class="modal-title" >Listado de activos</h5></center>  
       <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body" id="modalactivos2">
      <table id="bootstrap-data-table-export" style="width: 100%;" class="tblactivosfincas table table-striped table-bordered tabla display">
        <thead>
         <tr>
          <th>Activo</th>                             
          <th>Nombre</th> 
          <th>Serie</th>                        
          <th>Marca</th>
          <th>Modelo</th>
          <th>Color</th>
        </tr>
      </thead>
      <tbody>                  
        <?php foreach ($registros as $r): ?>
         <tr style="cursor: pointer;">
          <td><?php echo $r['Codigo']; ?>
          <td><?php echo $r['Nombre']; ?></td> 
          <td><?php echo $r['Serie']; ?></td>                         
          <td><?php echo $r['Marca']; ?></td>
          <td><?php echo $r['Modelo']; ?></td>
          <td><?php echo $r['Color']; ?></td>
        </tr>
      <?php  endforeach ?>
    </tbody>
  </table>
  <script src="<?php echo SERVERURL ?>vistas/assets/js/init-scripts/data-table/datatables-init.js"></script>         
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal">Atrás</button>  
</div>
</div>
</div>
</div>
</div>
</div>