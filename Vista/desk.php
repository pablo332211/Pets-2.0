<?php
    include('../Conexion/conexion.php');
    $DocM=$_GET['DocM'];
    //echo $DocM;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Vista/css/main.css">
</head>
<body>
    <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
            <div class="full-box dashboard-sideBar-ct">
                <!--SideBar Title -->
                <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                    Pets++ <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
                </div>
                <!-- SideBar User info -->
                <div class="full-box dashboard-sideBar-UserInfo">
                    <figure class="full-box">
                        <img src="./assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                        <figcaption class="text-center text-titles">Medico</figcaption>
                    </figure>
                    <ul class="full-box list-unstyled text-center">
                        <li>
                            <a href="<?php echo "./desk/cuenta/mi_cuenta.php?DocM=".urldecode($DocM)?>" title="Perfil">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo "desk.php?DocM=".urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../index.php" title="Salir del sistema">
                                <i class="zmdi zmdi-mail-reply"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                    <li>
                        <a href="<?php echo "./desk/registro/agregar_propietario.php?DocM=".urldecode($DocM)?>"> 
                            <i class="zmdi zmdi-folder"></i> Registros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "./desk/historia_clinica/historia_clinica-buscar.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Historia clinica
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "./desk/agendar_cita/agendar_cita-libre.php?DocM=".urldecode($DocM)?>"> 
                            <i class="zmdi zmdi-folder"></i> Agendar citas 
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "./desk/vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php?DocM=".urldecode($DocM)?>"> 
                            <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                        </a>
                    </li>
                </ul>    
            </div>
        </div>
    </section>

    <!-- Content page-->
    <section class="full-box dashboard-contentPage">
        <!-- NavBar -->
        <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
                <li class="pull-left">
                    <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                </li>
                <li>
                    <a href="search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Servicios</h1>
            </div>
        </div>
        <div class="full-box text-center" style="padding: 5px 5px;">
            <article class="full-box tile">
                <a href="<?php echo "./desk/registro/agregar_propietario.php?DocM=".urldecode($DocM)?>"> 
                    <div class="full-box tile-title text-center text-titles text-uppercase">
                        Registro
                    </div>
                    <div class="full-box tile-icon text-center">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="full-box tile-number text-titles">
                        <p class="full-box">1</p>
                        <small>Registro</small>
                    </div>
                </a>
            </article>
            <article class="full-box tile">
                <a href="<?php echo "./desk/historia_clinica/historia_clinica-buscar.php?DocM=".urldecode($DocM)?>">
                    <div class="full-box tile-title text-center text-titles text-uppercase">
                        Historica Clinica
                    </div>
                    <div class="full-box tile-icon text-center">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="full-box tile-number text-titles">
                        <p class="full-box">2</p>
                        <small>Historica Clinica</small>
                    </div>
                </a>
            </article>
            <article class="full-box tile">
                <a href="<?php echo "./desk/agendar_cita/agendar_cita-libre.php?DocM=".urldecode($DocM)?>">
                    <div class="full-box tile-title text-center text-titles text-uppercase">
                        Agendar cita
                    </div>
                    <div class="full-box tile-icon text-center">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="full-box tile-number text-titles">
                        <p class="full-box">3</p>
                        <small>Agendar cita</small>
                    </div>
                </a>
            </article>
        </div>
        <div class="full-box text-center" style="padding: 5px 5px;">
            <article class="full-box tile">
                <a href="<?php echo "./desk/vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php?DocM=".urldecode($DocM)?>">
                    <div class="full-box tile-title text-center text-titles text-uppercase">
                        Vacunación y desparacitación
                    </div>
                    <div class="full-box tile-icon text-center">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="full-box tile-number text-titles">
                        <p class="full-box">4</p>
                        <small>Vacunación y desparacitación</small>
                    </div>
                </a>
            </article>
        </div>
    </section>
    <!--====== Scripts -->
    <script src="./js/jquery-3.1.1.min.js"></script>
    <script src="./js/sweetalert2.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/material.min.js"></script>
    <script src="./js/ripples.min.js"></script>
    <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
    $.material.init();
    </script>
</body>

</html>