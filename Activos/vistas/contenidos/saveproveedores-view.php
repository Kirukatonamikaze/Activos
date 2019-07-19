
<div class="breadcrumbs">
 <div class="col-sm-4">
  <div class="page-header float-left">
   <div class="page-title">
    <h1><i class="menu-icon fa fa-truck"></i> Agregar Proveedores /<small>Realizar Registro</small></h1>
  </div>
</div>
</div>
<div class="col-sm-8">
 <div class="page-header float-right">
  <div class="page-title">
   <ol class="breadcrumb text-right">
    <li><a href="#">Principal</a></li>
    <li><a href="#">Proveedores</a></li>
    <li class="active">Agregar Proveedores</li>
  </ol>
</div>
</div>
</div>
</div>
<div>
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
           <div class="col-md-4">
            <div class="form-group">
             <label>Nit Proveedor<strong style="color: red;"></strong></label>
             <div class="input-group">
               <div class="input-group-addon"><i style="color: black;"  class="fa fa-barcode"></i></div>
               <input class="form-control"  required="" name="txtnit_proveedor" placeholder=" Ingrese el nit del proveedor">
             </div>
           </div>
         </div>
         <div class="col-md-4">
          <label>Nombre Proveedor<strong style="color: black;"></strong></label>
          <div class="form-group">
            <div class="input-group">
             <div class="input-group-addon"><i style="color: black;"  class="fa fa-user"></i></div>
             <input class="form-control"  required="" name="txtnombre_proveedor" placeholder="Ingrese el nombre del proveedor">
           </div>
         </div>
       </div>
       <div class="col-md-4">
        <label>Razon Social <strong style="color: black;"></strong></label>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon"><i style="color: black;"  class="fa fa-user"></i></div>
           <input class="form-control"  required="" name="txtrazonsocial_proveedor" placeholder="Ingrese la razón social del proveedor">
         </div>
       </div>
     </div> 
     <div class="col-md-4">
      <label>Dirección<strong style="color: black;"></strong></label>
      <div class="form-group">
        <div class="input-group">
         <div class="input-group-addon"><i style="color: black;"  class="fa fa-road"></i></div>
         <input class="form-control" type="text"  name="txtdireccion_proveedor" placeholder="Ingrese la dirección del proveedor">
       </div>
     </div>
   </div>   
   <div class="col-md-4">
    <label>Correo <strong style="color: black;"></strong></label>
    <div class="form-group">
      <div class="input-group">
       <div class="input-group-addon"><i style="color: black;"  class="fa fa-envelope-o"></i></div>
       <input class="form-control" type="email"  name="txtcorreo_proveedor" placeholder="Ingrese el correo del proveedor">
     </div>
   </div>
 </div>   
 <div class="col-md-4">
  <label>Telefono Proveedor<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-phone"></i></div>
     <input class="form-control" type="number"  name="txttelefono_proveedor" placeholder="Ingrese el telefono del proveedor">
   </div>
 </div>
</div>   
<div class="col-md-4">
  <label>País<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-map-marker"></i></div>
     <input class="form-control" type="text"  name="txtpais_proveedor" placeholder="Ingrese el país del proveedor">
   </div>
 </div>
</div>   
<div class="col-md-4">
  <label>Departamento<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-map-marker"></i></div>
     <input class="form-control" type="text"  name="txtdepartamento_proveedor" placeholder="Ingrese el departamento del proveedor">
   </div>
 </div>
</div>    
<div class="col-md-4">
  <label>Ciudad<strong style="color: black;"></strong></label>
  <div class="form-group">
    <div class="input-group">
     <div class="input-group-addon"><i style="color: black;"  class="fa fa-map-marker"></i></div>
     <input class="form-control" type="text"  name="txtciudad_proveedor" placeholder="Ingrese la ciudad del proveedor">
   </div>
 </div>
</div>                                   
<div class="col-md-12">
 <label>Area<strong style="color: black;"></strong></label>
 <div class="form-grupo">
  <div class="input-group">
    <div class="input-group-addon"><i style="color: black;"  class="fa  fa-toggle-down"></i></div>
    <select name="txttipo_proveedor" class="form-control">
     <option value="0">Seleccione el tipo de proveedor</option>
     <option value="1">INSUMOS</option>
     <option value="2">SISTEMAS</option>
     <option value="3">MANTENIMIENTO</option>
   </select>
 </div>
</div>
</div>                            
<br>
<br>
<br>        	             	 	           
</div>
</div>
</div>                      
<div class="col-md-12" style="margin-top: 30px;">
  <center><button  href="#!" style="border-radius: 5px;" type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp; Registrar Proveedor</button></center>
</div>                     
<div class="RespuestaAJAX"></div>
</form>
</div>
</div>
</div>
</div><!-- .animated -->
</div><!-- .content -->	

