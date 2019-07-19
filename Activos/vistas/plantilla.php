<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo COMPANIA; ?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <?php require './vistas/modulos/estilos-view.php'; ?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body >
    <style type="text/css">
        body::-webkit-scrollbar{
            width: 8px; 
            height: 5px;
        }
        body::-webkit-scrollbar-thumb{
            background: #000;
            border-radius: 4px;
        }
        body{
            background: white;


        }
    </style>
    <?php   
        session_start();
        if (!isset($_SESSION['usuario'])) {
            echo '<script> window.location.href="http://192.168.0.117/login/" </script>';   
        }else{
            if (!(($_SESSION['usuario']->FKId_tbltipo_usuario) == 15 || ($_SESSION['usuario']->FKId_tbltipo_usuario) == 14 || ($_SESSION['usuario']->FKId_tbltipo_usuario == 16))){
                echo '<script> window.location.href="http://192.168.0.117/login/" </script>';   
            }else{
               
                $peticionAJAX = false;
                require_once './controladores/vistasControlador.php';
                $vt = new vistasControlador();
                $vistasR = $vt->obtener_vistas_controlador();
                 if ($vistasR == 'login' || $vistasR == '404'){
                    if ($vistasR == 'login'){
                        $vistasR = './vistas/contenidos/login-view.php';
                        require_once $vistasR;
                    }else{
                        $vistasR = './vistas/contenidos/404-view.php';
                        require_once $vistasR;
                    }
                }else{
                    require './vistas/modulos/sideBar-view.php'; 
    ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php 
               require './vistas/modulos/navBar-view.php';

                    if ($vistasR == 'home'){
                        $vistasR = './vistas/contenidos/home-view.php';
                        require_once $vistasR;
                    }else{
                        require_once $vistasR; 
                    }
                }
            }   
        }     
        ?>    
        
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <?php 
    require './vistas/modulos/scripts-view.php'; ?>
    
</body>

</html>
