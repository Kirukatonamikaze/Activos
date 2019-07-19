<?php 
session_start();
if (isset($_POST['posicion_arreglo'])){
    $datos = $_SESSION['datos_activos'];
    $posicion_arreglo = $_POST['posicion_arreglo'];
    if (count($datos) == 1){
        unset($_SESSION['datos_activos']);
        echo "<script>$('#tabla_activos').remove();</script>";
    }else{
        unset($_SESSION['datos_activos'][$posicion_arreglo]);
        $datos = $_SESSION['datos_activos'];
    }
}else{
    if (isset($_SESSION['datos_activos'])){
        $datos = $_SESSION['datos_activos'];
        $existe = false;
        for ($i=0; $i < count($_SESSION['datos_activos']); $i++) { 
         if (($datos[$i]['datos'][0] == $_POST['datos'][0])){
          $existe = true;
      }
  }
  if (!$existe){
   $_SESSION['datos_activos'][] = $_POST;
   $datos = $_SESSION['datos_activos'];
}
}else{
    $_SESSION['datos_activos'][] = $_POST;
    $datos = $_SESSION['datos_activos'];
}
}
$keys = array_keys($_SESSION['datos_activos']);
$contador = 1; 
?>
<div class="col-lg-12">
    <div class="card">
     
        <div class="card-body">
            <table id="tbltrasladoactivos" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>     
                        <th>#</th>              
                        <th scope="col">Código Activo</th>
                        <th scope="col">Nombre Activo</th>
                        <th scope="col">Ubicación Activo</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($datos); $i++):?>
                        <tr>
                            <td><?php echo $contador; ?><input type="hidden" id="txtposicion_array" value="<?php echo($keys[$contador-1]); ?>"></td>
                            <td><?php echo $datos[$i]['datos'][0]; ?></td>
                            <td><?php echo $datos[$i]['datos'][1]; ?></td>
                            <td><?php echo $datos[$i]['datos'][2]; ?></td>
                            <td class="text-center"><a style="color: white; border-radius: 5px; font-size: 10px; font-weight: bold;" class="btn btn-danger" id="btnelminiaritem"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $contador++; endfor; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>