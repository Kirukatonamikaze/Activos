    <?php
    if (isset($_SESSION)) {    
      require './controladores/combosControlador.php';
      $clase_combo = new combosControlador();
      $finca = $clase_combo->buscar_fincas_controlador();
      $ubicacion = $clase_combo->buscar_ubicacion_controlador();
      $vidautil = $clase_combo->buscar_vidautil_controlador();
      $proveedor = $clase_combo->buscar_proveedor_controlador();
      $registros = $clase_combo->buscar_activos_asginados_controlador();
      $oficios = $clase_combo->buscar_oficios_controlador(); 
    } 
    ?>
    <div class="breadcrumbs">
     <div class="col-sm-4">
      <div class="page-header float-left">
       <div class="page-title">
        <h1><i class="menu-icon fa fa-bell"></i> Baja De Activos /<small>Realizar Baja</small></h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
   <div class="page-header float-right">
    <div class="page-title">
      <ol class="breadcrumb text-right">
        <li><a href="#">Principal</a></li>
        <li><a href="#">Baja De Activos</a></li>
        <li class="active">Realizar Baja</li>
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
        <div class="col-sm-12"> 
         <div class="col-md-12">
          <label> <h6>Finca</h6> <strong style="color: black;"></strong></label>
          <div class="form-grupo">
           <div class="input-group">
             <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
             <select name="cmbfinca_origen" class="form-control" id="cmbfinca1">
              <option value="0">Seleccione la finca</option>
              <?php foreach ($finca as $f): ?>
                <option value="<?php echo $f['PKCodigo'] ?>"><?php echo $f['Nombre_finca']; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>  
      <div  class="col-md-6">       
        <div class="form-grupo">
         <div class="input-group">
           <div ></div>
           <input type="hidden" name="cmbfinca_destino" value="1996">           
         </div>
       </div>
     </div>
   </div>
   <!-- Formulario sin cargar las fincas-->  
   <div style="margin-top: 35px;" class="col-md-12" id="cargaractivos">         
     <div class="col-md-4">
       <div class="form-group">
        <label><h6>Activo</h6></label>
        <div class="input-group">                        
         <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
         <input id="txtcodigoproducto_add"  required="" name="txtcodigoproducto_baja"  class="form-control" placeholder="Ingrese el producto" ><a  class="btn btn-info" data-toggle="modal" data-target="#modal"><i class="fa fa-search"></i></a>
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
<div class="col-sm-12"> 
 <div  style="margin-top: 70px;" class="col-md-6">
   <label> <h6>Motivo Baja</h6><strong style="color: black;"></strong></label>
   <div class="form-grupo">
    <div class="input-group">                          
     <textarea  name="txtmotivoviaje_reg"  rows="5" placeholder="Motivo del traslado" class="form-control"></textarea>
   </div>
 </div>
</div> 
<div style="margin-top: 70px;"  class="col-md-6">
  <label><h6>Observaciones</h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">                           
     <textarea name="txtObservaciones_reg"  rows="5" placeholder="Estado de la herramienta" class="form-control"></textarea>
   </div>
 </div>
</div> 
</div>
<div style="margin-top: 40px;" class="col-sm-12">                                                  
 <div class="col-md-4">
  <label> <h6>Responsable Entrega</h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
     <input   required="" readonly="readonly" name="txtresponsableentrega_reg"  class="form-control" placeholder="<?php echo $_SESSION['usuario']->PKUsuario; ?>" >
   </div>
 </div>
</div> 
<div class="col-md-4">
  <label> <h6>Documento Responsable</h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
     <input  required="" id="txtdocumentoresponsablebaja" name="txtdocumento_reponsablebajarecibe"  class="form-control" placeholder="Documento responsable baja" >
   </div>
 </div>
</div> 
<div class="col-md-4">
  <label> <h6>Nombre Responsable </h6> <strong style="color: black;"></strong></label>
  <div class="form-grupo">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-male"></i></div>
     <input readonly="readonly" id="txtnombre_reponsablerecibebaja"  name="txtnombre_reponsablebajarecibe"  class="form-control" placeholder="Nombre responsable baja" >
   </div>
 </div>
</div>         
</div>  
<div class="col-md-12" style="margin-top: 60px;">
  <button style="border-radius: 5px;  margin-left: 450px; " type="submit" class="btn btn-success"><i class="fa fa-arrow-down"></i>&nbsp; Bajar Activo</button>
</div>   
<div class="RespuestaAJAX">                            
</div>                  
</form> 
<div class="row" >
  <div class="col-md-6"></div>
  <div style="margin-top: -39px;" class="col-md-6 text-left">
    <form action="<?php echo(SERVERURL); ?>ajax/registrosAJAX.php" method="post" data-form="delete" class="FormularioAJAX" autocomplete="off">
      <input type="hidden" name="txtcancelar">
      <button style="border-radius: 5px;" name="btn-Cancelar" class="btn btn-danger" type="submit"><i class="fa fa-times"></i> Cancelar Baja</button>
      <div class="RespuestaAJAX"></div>
    </form>
  </div>
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
     <div class="modal-body" id="modalactivos">

     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal">Atrás</button>  
     </div>
   </div>
 </div>
</div>
</div>
</div>