 <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15||$_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
 <?php 
 if (isset($_SESSION['usuario'])) {   
   require './controladores/combosControlador.php';
   $clase_combo = new combosControlador();
   $tipoactivo = $clase_combo->buscar_tipoactivo_controlador();
   $subtipoactivo = $clase_combo->buscar_subtipoactivo_controlador();
   $vidautil = $clase_combo->buscar_vidautil_controlador();
   $proveedor = $clase_combo->buscar_proveedor_controlador();
 } 
 else{

  echo '<script> window.location.href="http://localhost/login/" </script>';
}
?>
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
   <div class="page-title">
    <h1><i class="menu-icon fa fa-bell"></i> Ingresar Activos /<small>Realizar Registro</small></h1>
  </div>
</div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
   <ol class="breadcrumb text-right">
    <li><a href="#">Principal</a></li>
    <li><a href="#">Ingresar Activos</a></li>
    <li class="active">Realizar Asignación</li>
  </ol>
</div>
</div>
</div>
</div>
<div class="content mt-12">
 <div class="animated fadeIn">
  <div class="row">
   <div class="col-sm-12">
    <div class="card-header">

    </div>
    <div class="card" style="padding: 20px;">                                            
      <form action="<?php echo SERVERURL ?>ajax/registrosAJAX.php" method="post" data-form="save" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">
        <div class="row">
         <div class="col-md-12">
          <div class="row">
           <div class="col-md-6">
            <div class="form-group">
             <label>Código Artículo<strong style="color: red;"></strong></label>
             <div class="input-group">
               <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
               <input class="form-control"  required="" name="txtcodigoproducto_reg" placeholder=" Ingrese el código del producto">
             </div>
           </div>
         </div>
         <div class="col-md-6">
          <label>Nombre Producto<strong style="color: black;"></strong></label>
          <div class="form-group">
            <div class="input-group">
             <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
             <input class="form-control"  required="" name="txtnombreproducto_reg" placeholder="Ingrese el nombre del producto">
           </div>
         </div>
       </div>                                 
       <div class="col-md-6">
         <label>Tipo producto<strong style="color: black;"></strong></label>
         <div class="form-grupo">
          <div class="input-group">
            <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
            <select name="cmbtipoproducto_reg" class="form-control" id="cmbtipo">
             <option value="0">Seleccione el tipo de producto</option>
             <?php foreach ($tipoactivo as $a): ?>
              <option value="<?php echo $a['PKId_tipoactivo'] ?>"><?php echo $a['Descripcion']; ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6" id="respuestasubtipo"></div>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-3">
      <div class="form-group">
        <label>N° Serie</label>
        <div class="input-group">
          <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
          <input  name="txtserie_reg"  class="form-control" placeholder="Ingrese el número de serie" >
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <label>Marca</label>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
          <input  name="txtmarca_reg" class="form-control" placeholder="Ingrese la marca" >
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <label>Modelo</label>
      <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
         <input name="txtmodelo_reg" class="form-control" placeholder="Ingrese el modelo" >
       </div>
     </div>
   </div>
   <div class="col-md-3">
    <label>Color</label>
    <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
       <input name="color_reg" class="form-control" placeholder="Ingrese el color" value="">
     </div>
   </div>
 </div> 
 <div id="computo" style="display: none;">
  <div class="col-md-4">
    <label>Procesador</label>
    <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
       <input name="procesador" class="form-control" placeholder="Ingrese el procesador" value="">
     </div>
   </div>
 </div>  <div class="col-md-4">
  <label>Memoria</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="memoria" class="form-control" placeholder="Ingrese la memoria" value="">
   </div>
 </div>
</div> 
<div class="col-md-4">
  <label>Disco duro</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="discoduro" class="form-control" placeholder="Ingrese el disco duro" value="">
   </div>
 </div>
</div> 
<div class="col-md-6">
  <label>Sistema operativo</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="sistema" class="form-control" placeholder="Ingrese el sistema operativo" value="">
   </div>
 </div>
</div> 
<div class="col-md-6">
  <label>Login</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="login" class="form-control" placeholder="Ingrese el login" value="">
   </div>
 </div>
</div>
</div>
<div class="col-md-4">
  <label>Capacidad</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="txtcapacidad_reg" class="form-control" placeholder="Digite la capacidad en LB o HP" value="">
   </div>
 </div>
</div>
<div class="col-md-4">
 <label>Vida Útil <strong style="color: black;"></strong></label>
 <div class="form-grupo">
   <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-exchange"></i></div>
     <select name="cmbvidautil_reg" class="form-control">
      <option value="0">Seleccione el tiempo en meses</option>
      <?php foreach ($vidautil as $t): ?>
        <option value="<?php echo $t['PKId_Vidautil'] ?>">
          <?php echo $t['Descripcion']; ?>
        </option>  
      <?php endforeach ?>
    </select>
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Proveedor<strong style="color: black;"></strong></label>
 <div class="form-grupo">
   <div class="input-group">
     <div class="input-group-addon"><i style="color: black;" class="  fa fa-warning"></i></div>
     <select name="cmbproveedor_reg" class="form-control">
       <option value="0">Seleccione el proveedor</option>
       <?php foreach ($proveedor as $p): ?>
         <option value="<?php echo $p['PKNit'] ?>"><?php echo $p['Proveedor']; ?>     </option>
       <?php endforeach ?>
     </select>
   </div>
 </div>
</div>
<div class="col-md-4">
  <label>Fecha de compra<strong style="color: black;"></strong></label>
  <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;" class="fa fa-calendar"></i></div>
    <input  type="date" name="txtfechacompra_reg" class="form-control" placeholder="Fecha de compra">
  </div>
</div>
</div>
<div class="col-md-4">
  <label>Número Factura Asunto<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><i style="color: black;" class="fa fa-tag"></i></div>
      <input  type="number" name="txtnumerofacturac_reg" class="form-control" placeholder="Número de factura">
    </div>
  </div>
</div>
<div class="col-md-4">
  <label>Costo Activo<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;" class="fa fa-money"></i></div>
     <input  type="number" name="txtcosto_reg" class="form-control" placeholder="Costo del activo">
   </div>
 </div>
</div>
<div class="col-md-12">
  <label>Observaciones<strong style="color: black;"></strong></label>
  <div class="input-group">
    <textarea name="txtobservaciones_reg" id="textarea-input" rows="6" placeholder="Contenido" class="form-control"></textarea>
  </div>
</div>
</div>
</div>
</div>                      
<div class="col-md-12" style="margin-top: 30px;">
  <center><button  href="#!" style="border-radius: 5px;" type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; Registrar Activo</button></center>
</div>                     
<div class="RespuestaAJAX"></div>
</form>
</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content --> 

<?php endif ?>

