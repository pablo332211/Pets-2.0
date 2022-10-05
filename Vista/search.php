<!DOCTYPE html>
<html lang="es">

<head>
    <title>Search</title>
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
                    <img src="../assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                    <figcaption class="text-center text-titles">Medico</figcaption>
                </figure>
                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="../desk/cuenta/mi_cuenta.php" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="desk.php" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../index.php" title="Salir del sistema">
                            <i class="zmdi zmdi-mail-reply"></i>
                        </a>
                    </li>
                </ul>
            </div>
             <!-- SideBar Menu -->
             <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="./herramientas/registro/Agregar_propietario.php"> 
                        <i class="zmdi zmdi-folder"></i> Registros
                    </a>
                </li>
                <li>
                    <a href="./herramientas/historia_clinica/historia_clinica-buscar.php">
                <i class="zmdi zmdi-folder"></i> Historia clinica
                    </a>
                </li>
                <li>
                    <a href="./herramientas/agendar_cita/agendar_cita-libre.php">
                <i class="zmdi zmdi-folder"></i> Agender citas 
                    </a>
                </li>
                <li>
                    <a href="./herramientas/vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php">
                        <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                    </a>
                </li>
                <li>
                    <a href="./herramientas/certificaciones/certificaciones-libre.php">
                        <i class="zmdi zmdi-folder"></i> Certificaciones
                    </a>
                </li>
            </ul>
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
                <h1 class="text-titles"><i class="zmdi zmdi-search zmdi-hc-fw"></i> BUSCAR</h1>
            </div>
            <p class="lead">/////////////////////////////////////////////////////////////</p>
        </div>

        <div class="container-fluid">
            <form class="well">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <div class="form-group label-floating">
                            <span class="control-label">¿Qué estas buscando?</span>
                            <input class="form-control" type="text" name="search_book_init" required="">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm"><i
                                    class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="container-fluid">
                <div class="row">
                    <nav class="text-center">
                        <ul class="pagination pagination-sm">
                            <li class="disabled"><a href="javascript:void(0)">«</a></li>
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)">5</a></li>
                            <li><a href="javascript:void(0)">»</a></li>
                        </ul>
                    </nav>
                </div>
        </div>


    </section>

    <!--====== Scripts -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/material.min.js"></script>
    <script src="../js/ripples.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
    $.material.init();
    </script>
</body>

</html>