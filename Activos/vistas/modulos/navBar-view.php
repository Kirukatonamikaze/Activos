<!-- Header-->
<header id="header" class="header">
    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" title="Contraer" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
               
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>


         
            </div>
        </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h4><?php echo $_SESSION['usuario']->PKUsuario; ?></h4>
                </a>
                <div class="user-menu dropdown-menu">
                    <form action="<?php echo SERVERURL ?>ajax/loginAJAX.php" method="post" data-form="logout" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="txtcerrarsesion">
                        <button class="btn btn-dark" name="btncerrarsesion" type="submit"> Cerrar Sesión</button>
                        <div class="RespuestaAJAX"></div>
                    </form>
               
                </div>
            </div>

       
        </div>
    </div>
</header><!-- /header -->
<!-- Header-->