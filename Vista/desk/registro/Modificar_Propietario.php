<?php 
include "../../../Conexion/conexion.php"; 
include "../../../Modelo/modelo_Propietario.php";
?>

<?php 

$DocM=$_GET['DocM'];

    //------------------ MODIFICAR PROPIETARIO ------------------------//
    $obj = new Propietario();

    if($_POST){
        $obj->Documento_Propietario = $_POST['Documento_Propietario'];
        $obj->NombreA_Propietario = $_POST['NombreA_Propietario'];
        $obj->NombreB_Propietario = $_POST['NombreB_Propietario'];
        $obj->ApellidoA_Propietario = $_POST['ApellidoA_Propietario'];
        $obj->ApellidoB_Propietario = $_POST['ApellidoB_Propietario'];
        $obj->Direccion_Propietario = $_POST['Direccion_Propietario'];
        $obj->Telefono_Propietario = $_POST['Telefono_Propietario'];
        $obj->Celular_Propietario = $_POST['Celular_Propietario'];
        $obj->Correo_Propietario = $_POST['Correo_Propietario'];
    }  
?>

<?php
$llave = $_GET['key'];
echo $llave;
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();

        $query = "SELECT * FROM propietario WHERE Documento_Propietario = '$llave'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->Documento_Propietario = $arreglo[0];
        $obj->NombreA_Propietario = $arreglo[1];
        $obj->NombreB_Propietario = $arreglo[2];
        $obj->ApellidoA_Propietario = $arreglo[3];
        $obj->ApellidoB_Propietario = $arreglo[4];
        $obj->Direccion_Propietario = $arreglo[5];
        $obj->Telefono_Propietario = $arreglo[6];
        $obj->Celular_Propietario = $arreglo[7];
        $obj->Correo_Propietario = $arreglo[8];
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                            <a href="<?php echo "../cuenta/mi_cuenta.php?DocM=".urldecode($DocM)?>" title="Perfil">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo "../../desk.php?DocM=".urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                    <li>
                        <a href="<?php echo "agregar_propietario.php?DocM=".urldecode($DocM)?>"> 
                            <i class="zmdi zmdi-folder"></i> Registros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../historia_clinica/historia_clinica-buscar.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Historia clinica
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Agender citas 
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php?DocM=".urldecode($DocM)?>">
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
                <h1 class="text-titles">DATOS PROPIETARIO</h1>
                
            </div>
        </div>


<!-- Formulario -->
<div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-edit"></i>&nbsp; DATOS PROPIETARIO</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" id="">
                        <fieldset>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">DNI / Cedula</label>
                                            <input class="form-control" type="text" name="Documento_Propietario" id="Documento_Propietario" value="<?php echo $obj->Documento_Propietario ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer Nombre</label>
                                            <input class="form-control" type="text" name="NombreA_Propietario" id="NombreA_Propietario" value="<?php echo $obj->NombreA_Propietario ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo Nombre</label>
                                            <input class="form-control" type="text" name="NombreB_Propietario" id="NombreB_Propietario" value="<?php echo $obj->NombreB_Propietario ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Primer Apellido</label>
                                            <input class="form-control" type="text" name="ApellidoA_Propietario" id="ApellidoA_Propietario" value="<?php echo $obj->ApellidoA_Propietario ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Segundo Apellido</label>
                                            <input class="form-control" type="text" name="ApellidoB_Propietario" id="ApellidoB_Propietario" value="<?php echo $obj->ApellidoB_Propietario ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Dirección</label>
                                            <input class="form-control" type="text" name="Direccion_Propietario" id="Direccion_Propietario" value="<?php echo $obj->Direccion_Propietario ?>" maxlength="170">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Teléfono</label>
                                            <input class="form-control" type="number" name="Telefono_Propietario" id="Telefono_Propietario" value="<?php echo $obj->Telefono_Propietario ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Celular</label>
                                            <input class="form-control" type="number" name="Celular_Propietario" id="Celular_Propietario" value="<?php echo $obj->Celular_Propietario ?>" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo_Propietario</label>
                                            <input class="form-control" type="text" name="Correo_Propietario" id="Correo_Propietario" value="<?php echo $obj->Correo_Propietario ?>" maxlength="50">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <p class="text-center" style="margin-top: 20px;">
                            <button name="modificar" type="submit" class="btn btn-info btn-raised btn-m">MODIFICAR</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

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