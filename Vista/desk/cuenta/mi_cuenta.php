<?php
include "../../../Conexion/conexion.php";
?>

<?php
$DocM=$_GET['DocM'];
    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT * FROM medico WHERE Documento_Medico= '$DocM'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->Documento_Medico = $arreglo[0];
    $obj->NombreA_Medico = $arreglo[1];
    $obj->NombreB_Medico =$arreglo[2];
    $obj->ApellidoA_Medico = $arreglo[3];
    $obj->ApellidoB_Medico = $arreglo[4];
    $obj->Correo_Medico =$arreglo[5];
    $obj->Telefono_Medico = $arreglo[6];
    $obj->Celular_Medico = $arreglo[7];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Mi Cuenta</title>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
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
                        <img src="../../assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                        <figcaption class="text-center text-titles">Medico</figcaption>
                    </figure>
                    <ul class="full-box list-unstyled text-center">
                        <li>
                            <a href="<?php echo "mi_cuenta.php?DocM=".urldecode($DocM)?>" title="Perfil">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo "../../desk.php?DocM=".urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../../index.php" title="Salir del sistema">
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
                            <i class="zmdi zmdi-folder"></i> Agender citas 
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
                    <a href="../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MI CUENTA</small></h1>
            </div>
        </div>

        <!-- Panel mis datos -->
        <div class="container-fluid">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; INFORMACION</h3>
                </div>
                <div class="panel-body">
                    <form>
                    <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">DNI / Cedula</label>
                                            <input class="form-control" type="text" name="Documento_Medico" id="Documento_Medico" value="<?php echo $obj->Documento_Medico ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer Nombre</label>
                                            <input class="form-control" type="text" name="NombreA_Medico" id="NombreA_Medico" value="<?php echo $obj->NombreA_Medico ?>" readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo Nombre</label>
                                            <input class="form-control" type="text" name="NombreB_Medico" id="NombreB_Medico" value="<?php echo $obj->NombreB_Medico ?>" readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer Apellido</label>
                                            <input class="form-control" type="text" name="ApellidoA_Medico" id="ApellidoA_Medico" value="<?php echo $obj->ApellidoA_Medico ?>" readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo Apellido</label>
                                            <input class="form-control" type="text" name="ApellidoB_Medico" id="ApellidoB_Medico" value="<?php echo $obj->ApellidoB_Medico ?>" readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Dirección</label>
                                            <input class="form-control" type="text" name="Correo_Medico" id="Correo_Medico" value="<?php echo $obj->Correo_Medico ?>" readOnly maxlength="170">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono</label>
                                            <input class="form-control" type="number" name="Telefono_Medico" id="Telefono_Medico" value="<?php echo $obj->Telefono_Medico ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Celular</label>
                                            <input class="form-control" type="number" name="Celular_Medico" id="Celular_Medico" value="<?php echo $obj->Celular_Medico ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </section>



    <!--====== Scripts -->
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <script src="../../js/sweetalert2.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/material.min.js"></script>
    <script src="../../js/ripples.min.js"></script>
    <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../js/main.js"></script>
    <script>
    $.material.init();
    </script>
</body>

</html>