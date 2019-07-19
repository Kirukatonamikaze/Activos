 <?php 

 

include("conexion_main.php");
$usu = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');

// encriptar -- $passencript = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 12]);
// -- desencriptar $result = $password_verify($usuario->Pass, $pass);


if ($u = $bdm->query("SELECT tblusuarios.FKId_tbltipo_usuario, tblfincas.PKCodigo, tblusuarios.PKUsuario, tblusuarios.FKId_tblestado_usuario FROM db_master.tblfincas, db_master.tblusuarios, db_master.tblestado_usuario  WHERE PKUsuario = '$usu'  AND tblusuarios.FKId_tblestado_usuario = tblestado_usuario.PKId AND tblfincas.PKCodigo = tblusuarios.FKCodigo_tblfincas")->fetch(PDO::FETCH_OBJ)) 
{
  if ($u->FKId_tblestado_usuario == 1) {
    session_start();
    $_SESSION['usuario'] = $u;
    if ($_SESSION['usuario']->FKId_tbltipo_usuario == 14 || $_SESSION['usuario']->FKId_tbltipo_usuario == 1|| $_SESSION['usuario']->FKId_tbltipo_usuario == 15|| $_SESSION['usuario']->FKId_tbltipo_usuario == 16) {
      $salida = 1;
    }else{
      $salida = '<p class="alert-info" style="
            text-align: center;
            font-size: 20px;">No tienes permisos, consulte con el administrador.
          </p>';
    }
  }
  else{
    $salida = '<p class="alert-info" style="
            text-align: center;
            font-size: 20px;">Usuario inhabilitado, consulte con el administrador.
          </p>';
  }
}
else
{
  
  $salida = '<p class="alert-danger" style="
            text-align: center;
            font-size: 20px;">Usuario o contraseña incorrecta.
          </p>';
}

echo $salida;

?>