<?php 
include "../../../Conexion/conexion.php";
include "../../../Login/administrador/modelo/Modelo_Medico.php";

?>

<?php

$obj = new medico();
if ($_POST) {
    $obj->Documento_Medico = $_POST['Documento_Medico'];
    $obj->NombreA_Medico = $_POST['NombreA_Medico'];
    $obj->NombreB_Medico = $_POST['NombreB_Medico'];
    $obj->ApellidoA_Medico = $_POST['ApellidoA_Medico'];
    $obj->ApellidoB_Medico = $_POST['ApellidoB_Medico'];
    $obj->Correo_Medico = $_POST['Correo_Medico'];
    $obj->Telefono_Medico = $_POST['Telefono_Medico'];
    $obj->Celular_Medico = $_POST['Celular_Medico'];
    $obj->Contrasena_Medico = $_POST['Contrasena_Medico'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agregar medico</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../Vista/css/main.css">
</head>

<body>
    <!-- SideBar -->
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
                    <img src="../../../Vista/assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
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
                    <a href="administradorDesk.php">
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
                    <a href="" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- CONTIENE PAGINA DE MEDICOS GENERAL -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuario <small>MEDICO</small></h1>
            </div>

        </div>
        <div class="container-fluid">
            <ul class="breadcrumb breadcrumb-tabs">
                <li>
                    <a href="#!" class="btn btn-info">
                        <i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR MEDICO
                    </a>
                </li>
                <li>
                    <a href="../vistasAdministrador/medicoBuscar.php" class="btn btn-primary">
                        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR MEDICOS
                    </a>
                </li>
            </ul>
        </div>

        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO MEDICO</h3>
                </div>
                <div class="panel-body">
                    <form action="" id="medico" method="POST">

                        <fieldset>
                            <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">

                                        <div class="form-group label-floating">
                                            <label class="control-label">Numero DNI</label>
                                            <input pattern="[0-9-]{1,20}" class="form-control" type="text" name="Documento_Medico" id="Documento_Medico" required maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer nombre</label>
                                            <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="NombreA_Medico" id="NombreA_Medico" required maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo nombre</label>
                                            <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="NombreB_Medico" id="NombreB_Medico" maxlength="20">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer apellido</label>
                                            <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="ApellidoA_Medico" id="ApellidoA_Medico" required maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo apellido</label>
                                            <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="ApellidoB_Medico" id="ApellidoB_Medico" maxlength="20">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo</label>
                                            <input class="form-control" type="email" name="Correo_Medico" id="Correo_Medico" required maxlength="100">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono</label>
                                            <input pattern="[0-9-]{1,20}" class="form-control" type="text" name="Telefono_Medico" id="Telefono_Medico" required maxlength="20">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Celular</label>
                                            <input pattern="[0-9-]{1,20}" class="form-control" type="text" name="Celular_Medico" id="Celular_Medico" required maxlength="20">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contraseña</label>
                                            <input  pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="password" name="Contrasena_Medico" id="Contrasena_Medico" required maxlength="20">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </fieldset>
                        <br>

                        <!--boton para subir informacion-->

                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-info btn-raised btn-sm" name="agregarMedico"><i class="zmdi zmdi-floppy"></i> Agregar</button>
                        </p>

                        <p class="text-center" style="margin-top: 20px;">
                            <a href="administradorDesk.php">
                                <button type="button" class="btn btn-info btn-raised btn-sm" name="volver"><i class="zmdi zmdi-floppy"></i> Inicio</button></a>
                        </p>
                    </form>
                </div>
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