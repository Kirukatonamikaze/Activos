<?php 
require_once './controladores/registrosControlador.php';
$mostrar_datos = new registrosControlador();
$n_registro = explode("/",$_GET['views']);
$datos_informes = $mostrar_datos->buscar_registrosespecifico_controlador_detalle($n_registro[1])->fetch();
?>
<div style=" width: 98%">
 <div class="animated fadeIn">
  <div class="row">
   <div class="col-md-12">           
    <div class="card">
     <div class="card-header">
      <strong class="card-title">Detalle de activos fijos </strong>
      <div>
        <div class="col-md-4">
         <label><h4>Código:</h4><strong style="color: black;"></strong></label>
         <div class="form-group">
           <div class="input-group">
            <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
            <input class="form-control"  readonly="readonly" name="txtcodigopropducto_view" value="<?php echo $datos_informes['Codigo'];?>">
          </div>
        </div>
      </div>      
      <div class="col-md-8">
       <label><h4>Nombre:</h4><strong style="color: black;"></strong></label>
       <div class="form-group">
         <div class="input-group">
          <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
          <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Nombre']; ?>" name="txtnombreproducto_view" >
        </div>
      </div>
    </div>  
    <div class="col-md-6">
     <label><h4>Tipo:</h4><strong style="color: black;"></strong></label>
     <div class="form-group">
       <div class="input-group">
        <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
        <input class="form-control"  readonly="readonly" name="txttipoproducto-view" value="<?php echo $datos_informes['Tipo']; ?>">
      </div>
    </div>
  </div> 
  <div class="col-md-6">
    <label><h4>Subtipo:</h4><strong style="color: black;"></strong></label>
    <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
       <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Subtipo']; ?>">
     </div>
   </div>
 </div>     
 <br>   
 <br> 
 <br> 
 <div class="col-md-3">
   <label><h4>Serie:</h4><strong style="color: black;"></strong></label>
   <div class="form-group">
     <div class="input-group">
      <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
      <input class="form-control"  readonly="readonly" name="txtseriepropducto_view" value="<?php echo $datos_informes['Serie'];?>">
    </div>
  </div>
</div>      
<div class="col-md-3">
 <label><h4>Marca:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Marca']; ?>" name="txtmarcaproducto_view" >
  </div>
</div>
</div>  
<div class="col-md-3">
 <label><h4>Modelo:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txtmodeloproducto-view" value="<?php echo $datos_informes['Modelo']; ?>">
  </div>
</div>
</div> 
<br>   
<br>   
<br>        
<div class="col-md-3">
 <label><h4>Color:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Color']; ?>">
  </div>
</div>
</div>   <div class="col-md-3">
 <label><h4>Procesador:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Procesador']; ?>">
  </div>
</div>
</div>   <div class="col-md-3">
 <label><h4>Memoria:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Memoria']; ?>">
  </div>
</div>
</div>   <div class="col-md-3">
 <label><h4>Disco duro:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Disco']; ?>">
  </div>
</div>
</div>   <div class="col-md-3">
 <label><h4>Sistema operativo:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Sistema']; ?>">
  </div>
</div>
</div>   <div class="col-md-4">
 <label><h4>Login:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txttipoproducto-view"value="<?php echo $datos_informes['Login']; ?>">
  </div>
</div>
</div>    
<div class="col-md-4">
 <label><h4>Capacidad:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
    <input class="form-control"  readonly="readonly" name="txtcapacidadpropducto_view" value="<?php echo $datos_informes['Capacidad'];?>">
  </div>
</div>
</div>      
<div class="col-md-4">
  <label><h4>Vida Útil:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-calendar"></i></div>
     <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Vida_Util']."&nbsp;"."Años"; ?>" name="txtvidautilproducto_view" >
   </div>
 </div>
</div>  
<div class="col-md-4">
  <label><h4>Proveedor:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-truck"></i></div>
     <input class="form-control"  readonly="readonly" name="txtproveedorproducto-view" value="<?php echo $datos_informes['Proveedor']; ?>">
   </div>
 </div>
</div>
<br>   
<br>   
<br>        
<div class="col-md-4">
 <label><h4>Fecha Compra:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-calendar"></i></div>
    <input class="form-control"  readonly="readonly" name="txtfechacompraproducto-view"value="<?php echo $datos_informes['Fecha_Compra']; ?>">
  </div>
</div>
</div>     
<div class="col-md-4">
  <label><h4>N° Factura:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-file-text-o"></i></div>
     <input class="form-control"  readonly="readonly" name="txtn°facturapropducto_view" value="<?php echo $datos_informes['N_Factura'];?>">
   </div>
 </div>
</div>      
<div class="col-md-6">
 <label><h4>Costo:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-money"></i></div>
    <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Costo']; ?>" name="txtcostoproducto_view" >
  </div>
</div>
</div> 
<div class="col-md-6">
 <label><h4>Responsable Recibe:</h4><strong style="color: black;"></strong></label>
 <div class="form-group">
   <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa fa-money"></i></div>
    <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Responsable']; ?>" name="txtcostoproducto_view" >
  </div>
</div>
</div> 
<br>   
<br>   
<br> 
<div class="col-md-12">
  <label><h4>Resposable Registro:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-user"></i></div>
     <input class="form-control"  readonly="readonly" name="txtfincaproducto-view"value="<?php echo $datos_informes['Responsable_Save']; ?>">
   </div>
 </div>
 <div class="col-md-3">
  <label><h4>Finca Actual:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-home"></i></div>
     <input class="form-control"  readonly="readonly" name="txtfincaproducto-view"value="<?php echo $datos_informes['Finca_Destino']; ?>">
   </div>
 </div>
</div>    
<div class="col-md-3">
  <label><h4>Ubicación:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><i style="color: black;"  class="fa fa-thumb-tack"></i></div>
      <input class="form-control"  readonly="readonly" name="txtubicacionpropducto_view" value="<?php echo $datos_informes['Ubicacion'];?>">
    </div>
  </div>
</div>      
<div class="col-md-3">
  <label><h4>Fecha Asignacion:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><i style="color: black;"  class="fa fa-calendar"></i></div>
      <input class="form-control"  readonly="readonly" value="<?php echo $datos_informes['Fecha_Registro']; ?>" name="txtfechaasignacionproducto_view" >
    </div>
  </div>
</div>  
<div class="col-md-3">
  <label><h4>Estado:</h4><strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><i style="color: black;"  class="fa fa-book"></i></div>
      <input class="form-control"  readonly="readonly" name="txtestadoproducto-view" value="<?php echo $datos_informes['Movimiento_Naranja']; ?>">
    </div>
  </div>
</div>  
<br>   
<br>   
<br>     
<center> <a href="<?php echo SERVERURL; ?>editaractivos/<?php echo mainModel::encryption(
$datos_informes['Codigo']); ?>/"  class="btn  fa fa-edit ">
</a>Editar</center>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
