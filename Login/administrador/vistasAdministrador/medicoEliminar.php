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

$llave = $_GET['key'];
//echo  $llave;
if (isset($_POST['eliminarMedico'])) {
    $obj->Documento_Medico = "";
    $obj->NombreA_Medico = "";
    $obj->NombreB_Medico = "";
    $obj->ApellidoA_Medico = "";
    $obj->ApellidoB_Medico = "";
    $obj->Telefono_Medico = "";
    $obj->Celular_Medico = "";
    $obj->Contrasena_Medico = "";
} else {
    $clas = new conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM medico WHERE Documento_Medico = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->Documento_Medico = $arreglo[0];
    $obj->NombreA_Medico = $arreglo[1];
    $obj->NombreB_Medico = $arreglo[2];
    $obj->ApellidoA_Medico = $arreglo[3];
    $obj->ApellidoB_Medico = $arreglo[4];
    $obj->Correo_Medico = $arreglo[5];
    $obj->Telefono_Medico = $arreglo[6];
    $obj->Celular_Medico = $arreglo[7];
    $obj->Contrasena_Medico = $arreglo[8];
}



?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>MEDICOSELIMINAR</title>
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
                    <figcaption class="text-center text-titles">Administrador</figcaption>
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
                            <a href=""><i class="zmdi zmdi-labels zmdi-hc-fw"></i>Agregar/Buscar medicos</a>
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
                    <a href="search.html" class="btn-search">
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
                    <a href="agregarMedico.php" class="btn btn-info">
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

        <!-- Panel para agregar medicos -->


        <!-- Panel listado de busqueda de medicos -->
        <div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="zmdi zmdi-delete"></i> &nbsp; RESULTADO
                    </h3>
                </div>
                <form action="" name="medico" id="medico" method="POST">
                    <fieldset>
                        <legend><i class="zmdi zmdi-account-box"></i> &nbsp;Eliminar medico</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">

                                    <div class="form-group label-floating">
                                        <label class="control-label">Numero DNI*</label>
                                        <input pattern="[0-9-]{1,30}" class="form-control" type="number" name="Documento_Medico" id="Documento_Medico" value="<?php echo $obj->Documento_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Primer nombre*</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="NombreA_Medico" id="NombreA_Medico" value="<?php echo $obj->NombreA_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Segundo nombre</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="NombreB_Medico" id="NombreB_Medico" value="<?php echo $obj->NombreB_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Primer apellido*</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ApellidoA_Medico" id="ApellidoA_Medico" value="<?php echo $obj->ApellidoA_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Segundo apellido*</label>
                                        <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="ApellidoB_Medico" id="ApellidoA_Medico" value="<?php echo $obj->ApellidoA_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Correo*</label>
                                        <input class="form-control" type="email" name="Correo_Medico" id="Correo_Medico" value="<?php echo  $obj->Correo_Medico; ?>" readonly placeholder="" maxlength="30">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Teléfono*</label>
                                        <input class="form-control" type="text" name="Telefono_Medico" id="Telefono_Medico" value="<?php echo  $obj->Telefono_Medico ?>" readonly placeholder="" maxlength="15">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Celular*</label>
                                        <input class="form-control" type="text" name="Celular_Medico" id="Celular_Medico" value="<?php echo $obj->Celular_Medico; ?>" readonly placeholder="" maxlength="15">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Contrasena_Medico*</label>
                                        <input class="form-control" type="password" name="Contrasena_Medico" id="Contrasena_Medico" value="<?php echo $obj->Contrasena_Medico ?>" readonly placeholder="" maxlength="15">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <br>

                    <!--boton para subir informacion-->

                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-danger btn-raised btn-sm" name="eliminarMedico"><i class="zmdi zmdi-danger"></i> Eliminar</button>
                    </p>

                </form>
                

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