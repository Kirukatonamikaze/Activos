<!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#" style="font-weight: bold;">Activos Fijos</a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo SERVERURL ?>home/" id="principal"> <i class="menu-icon fa fa-dashboard"></i>Principal </a>
                    </li>
                    <h3 class="menu-title">Menu Principal</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sign-in"></i>Ingresar Activos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15 || $_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                             <li><i class="menu-icon fa fa-save"></i>
                                <a href="<?php echo SERVERURL ?>savesolicitud/">Ingresar Activo </a>
                            </li>   
                            <?php endif ?>
                             <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15 || $_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                            <li><i class="menu-icon fa fa-list-ul"></i>
                                <a href="<?php echo SERVERURL ?>listactivos/">Listado Activos </a>
                                <?php endif ?>
                            </li>
                                <li><i class="menu-icon fa fa-list-ul"></i>
                                <a href="<?php echo SERVERURL ?>historyreg/">Historial De Registros</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-save"></i>Asignar Activos</a>
                        <ul class="sub-menu children dropdown-menu">
                              <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15|| $_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                            <li><i class="menu-icon fa fa-save"></i>
                                <a href="<?php echo SERVERURL ?>saveregistrofinca/">Realizar Asignación</a>
                            </li>
                             <?php endif ?>
                            <li><i class="menu-icon fa fa-list"></i>
                                <a href="<?php echo SERVERURL ?>listregistros/">Activos Por Finca</a>
                            </li>
                        </ul>
                    </li> 
                     <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15|| $_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                      <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-exchange"></i>Trasladar Activos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-exchange"></i>
                                <a href="<?php echo SERVERURL ?>trasladaractivo/">Realizar Traslado</a>
                            </li>
                        </ul>
                    </li> 
                      <?php endif ?>
                       <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15 ||$_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                        <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sign-out"></i>Baja De Activos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon  fa fa-sign-out"></i>
                                <a href="<?php echo SERVERURL ?>bajaractivos/">Realizar Baja</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i>Proveedores</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if ($_SESSION['usuario']->FKId_tbltipo_usuario == 15 || $_SESSION['usuario']->FKId_tbltipo_usuario == 16): ?>
                            <li><i class="menu-icon  fa fa-save"></i>
                                <a href="<?php echo SERVERURL ?>saveproveedores/">Agregar Proveedores</a>
                            </li>
                                 <?php endif ?>
                            <li><i class="menu-icon  fa fa-list"></i>
                                <a href="<?php echo SERVERURL ?>listproveedores/">Ver Proveedores</a>
                            </li>
                        </ul>
                    </li>   
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                         <form action="<?php echo SERVERURL ?>ajax/loginAJAX.php" method="post" data-form="logout" class="FormularioAJAX" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" name="txtcerrarsesion"> 
                                <br>
                                <center><button class="btn btn-dark" name="btncerrarsesion" type="submit">&nbsp;Cerrar Sesión</button></center>
                                <div class="RespuestaAJAX"></div>
                            </form>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
<!-- Left Panel -->
