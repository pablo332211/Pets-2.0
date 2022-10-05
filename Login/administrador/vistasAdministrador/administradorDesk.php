
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../Vista/css/main.css">
</head>

<body>
<section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">

            <!--tITULO -->

            <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                PETT++ <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <figure class="full-box">
                    <img src="../../../vistasPlataforma/assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                    <figcaption class="text-center text-titles">ADMINISTRAOR</figcaption>
                </figure>
                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="" title="Mis datos">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" title="Mi cuenta">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" title="Salir del sistema" class="btn-exit-system">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!--  Menu GENERAL -->

            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="#!">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="../../../Index.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Ver sitio web</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-labels zmdi-hc-fw"></i>Ver plataforma</a>
                        </li>
                    </ul>
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
                <h1 class="text-titles">Medicos</h1>
            </div>
        </div>
        <div class="full-box text-center" style="padding: 5px 5px;">
            <article class="full-box tile">
                <a href="agregarMedico.php">
                    <div class="full-box tile-title text-center text-titles text-uppercase">
                       MEDICOS
                    </div>
                    <div class="full-box tile-icon text-center">
                        <i class="zmdi zmdi-folder"></i>
                    </div>
                    <div class="full-box tile-number text-titles">
                        <p class="full-box">1</p>
                        <small>Crear Usuarios</small>
                    </div>
                </a>
            </article>
        </div>
        
        </div>
    </section>
  

    <!--====== Scripts -->
    
    <script src="../../../Vista/js/jquery-3.1.1.min.js"></script>
    <script src="../../../Vista/js/sweetalert2.min.js"></script>
    <script src="../../../Vista/js/bootstrap.min.js"></script>
    <script src="../../../Vista/js/material.min.js"></script>
    <script src="../../../Vista/js/ripples.min.js"></script>
    <script src="../../../Vista/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../../Vista/js/main.js"></script>
    <script>
        $.material.init();
    </script>
</body>

</html>