
<?php 

require_once './controladores/registrosControlador.php';
$mostrar_datos = new registrosControlador();
$n_registro = explode("/",$_GET['views']);
$datos_informes = $mostrar_datos->buscar_registrosespecifico_controlador($n_registro[1])->fetch();
?>
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1><i class="menu-icon fa fa-bell"></i> Actualizar Registro </h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="#">Principal</a></li>
          <li><a href="#">Solicitudes</a></li>
          <li class="active">Realizar Solicitud</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="content mt-12">
 <div class="animated fadeIn">
   <div class="row">
     <div class="col-sm-12">
      <div class="card" style="padding: 20px;">                                 
        <form action="<?php echo SERVERURL ?>ajax/registrosAJAX.php" method="post" data-form="save" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">     
         <div class="col-md-4">
          <div class="form-group">
           <label>Código Artículo<strong style="color: red;"></strong></label>
           <div class="input-group">
             <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
             <input class="form-control" readonly=" readonly"  name="txtcodigoproducto_up"  value="<?php echo $datos_informes['Codigo']; ?>">
           </div>
         </div>
       </div>
       <div class="col-md-4">
        <label>Nombre Producto<strong style="color: black;"></strong></label>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
           <input class="form-control"   value="<?php echo $datos_informes['Nombre_Activo']; ?>" name="txtnombreproducto_up" >
         </div>
       </div>
     </div>  
     <div class="col-md-4">
      <label>Tipo Producto<strong style="color: black;"></strong></label>
      <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon" ><i style="color: black;"  class="fa fa-book"></i></div>
         <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Tipo']; ?>" name="txttipoproducto_up" >
       </div>
     </div>
   </div>  
   <div class="col-md-4">
    <label>Subtipo Producto<strong style="color: black;"></strong></label>
    <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
       <input class="form-control" readonly="readonly" value="<?php echo $datos_informes['Subtipo']; ?>" name="txtsubtipoproducto_up" >
     </div>
   </div>
 </div>                                 
 <div class="col-md-4">
  <div class="form-group">
   <label>N° Serie</label>
   <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
     <input  name="txtserie_up" value="<?php echo $datos_informes['Serie']; ?>"  class="form-control" >
   </div>
 </div>
</div>
<div class="col-md-4">
  <label>Marca</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input  name="txtmarca_up" class="form-control" value="<?php echo $datos_informes['Marca']; ?>" >
   </div>
 </div>
</div>
<div class="col-md-4">
  <label>Modelo</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="txtmodelo_up" class="form-control" value="<?php echo $datos_informes['Modelo']; ?>" >
   </div>
 </div>
</div>
<div class="col-md-4">
 <label>Color</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
    <input name="txtcolor_up" class="form-control" value="<?php echo $datos_informes['Color']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Procesador</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
    <input name="txtprocesador_up" class="form-control" value="<?php echo $datos_informes['Procesador']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Memoria</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
    <input name="txtmemoria_up" class="form-control" value="<?php echo $datos_informes['Memoria']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Disco</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-circle"></i></div>
    <input name="txtdisco_up" class="form-control" value="<?php echo $datos_informes['Disco']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Sistema</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
    <input name="txtsistema_up" class="form-control" value="<?php echo $datos_informes['Sistema']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Login</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-user"></i></div>
    <input name="txtlogin_up" class="form-control" value="<?php echo $datos_informes['Login']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
  <label>Capacidad</label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
     <input name="txtcapacidad_up" class="form-control" value="<?php echo $datos_informes['Capacidad']; ?>">
   </div>
 </div>
</div>
<div class="col-md-4">
 <label>Vida Útil</label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-flickr"></i></div>
    <input readonly="readonly" name="txtvidautil_up" class="form-control" value="<?php echo $datos_informes['Vida_Util']."&nbsp;"."Años"; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
 <label>Proveedor</label>
 <div class="form-group">
  <div class="input-group">
   <div class="input-group-addon"><i style="color: black;"  class="fa fa-truck"></i></div>
   <input name="txtproveedor_up"  readonly="readonly" class="form-control" value="<?php echo $datos_informes['Proveedor']; ?>">
 </div>
</div>
</div>         
<div class="col-md-4">
 <label>Fecha de compra<strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;" class="fa fa-calendar"></i></div>
    <input  type="date" readonly="readonly" name="txtfechacompra_up" class="form-control" value="<?php echo $datos_informes['Fecha_Compra']; ?>">
  </div>
</div>
</div>
<div class="col-md-4">
  <label>Número Factura Asunto<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;" class="fa fa-tag"></i></div>
     <input  type="number" readonly="readonly" name="txtnumerofacturac_up" class="form-control" value="<?php echo $datos_informes['N_Factura']; ?>">
   </div>
 </div>
</div>
<div class="col-md-4">
  <label>Costo Activo<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;" class="fa fa-money"></i></div>
     <input  type="number" readonly="readonly" name="txtcosto_up" class="form-control" value="<?php echo $datos_informes['Costo']; ?>">
   </div>
 </div>
</div> 
<div class="col-md-12">
  <label>Observaciones<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;" class="fa fa-book"></i></div>
     <input  type="text"  style="height: : 30%;"   name="txtobservaciones_up" class="form-control" >
   </div>
 </div>
</div>                              

<center>
  <div class="col-md-12" style="margin-top: 20px; margin-left: -75px;">
    <button href="#!" style="border-radius: 5px;" type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; Actualizar Registro </button>
  </div>
</center>
<div class="RespuestaAJAX"></div>
</form>
</div>
</div>
</div>  
</div><!-- .animated -->  
</div><!-- .content --> 



