<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_CitaMedica.php";
include "../../../Modelo/modelo_CitaMedicaPropietario.php";
include "../../../Modelo/modelo_CitaMedicaMascota.php";

    $DocM=$_GET['DocM'];

    $obj = new citaMedica_Mascota();
    $obj = new citaMedica_Propietario();
    $obj = new cita_medica();

    if ($_POST) {
        $obj->FK_DocumentoPropietario = $_POST['FK_DocumentoPropietario'];
        $obj->FK_CodigoCitaMedica = $_POST['FK_CodigoCitaMedica'];
        $obj->Fecha_CitaMedica = $_POST['Fecha_CitaMedica'];
        //mascota
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->FK_CodigoCitaMedica= $_POST['FK_CodigoCitaMedica'];  

        $obj->Codigo_CitaMedica=$_POST['FK_CodigoCitaMedica'];
    }

    $llave = $_GET['key'];
    echo $llave;
    $obj = new citaMedica_Propietario();

    if (isset($_POST['eliminar'])){   
        $obj->FK_DocumentoPropietario = "";
        $obj->FK_CodigoCitaMedica = "";
        $obj->Fecha_CitaMedica = "";
        $obj->FK_CodigoMascota = "";
        $obj->Observacion_CitaMedica = "";

    }
    else {
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM propietario_citamedica WHERE FK_CodigoCitaMedica = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->FK_DocumentoPropietario = $arreglo[0];
    $obj->FK_CodigoCitaMedica = $arreglo[1];
    $obj->Fecha_CitaMedica = $arreglo[2];
    $obj->Observacion_CitaMedica = $arreglo[3];

    $query = "SELECT FK_CodigoMascota FROM mascota_citamedica WHERE FK_CodigoCitaMedica = '$llave'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->FK_CodigoMascota = $arreglo[0];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Eliminar Cita</title>
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
                            <a href="<?php echo "../cuenta/mi_cuenta.php?DocM=".urldecode($DocM)?>" title="Perfil">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo "../../desk.php?DocM=".urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo "agendar_cita-buscar-libre.php?DocM=".urldecode($DocM)?>" title="Historias Clinicas">
                                <i class="zmdi zmdi-mail-reply-all"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                    <li>
                        <a href="<?php echo "../registro/agregar_propietario.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Registros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../historia_clinica/historia_clinica-buscar.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Historia clinica
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=".urldecode($DocM)?>">
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

        <!-- Contenedor de crear o buscar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Elimina Cita Medica</h1>
            </div>
        </div>
        <!-- Panel listado de busqueda de medicos -->
        <div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="zmdi zmdi-delete"></i> &nbsp; INFORMACION CITA MEDICA
                    </h3>
                </div>
                <form action="" name="propietario_citamedica" id="propietario_citamedica" method="POST">
                    <fieldset>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Cod cita</label>
                                        <input class="form-control" type="number" name="FK_CodigoCitaMedica"
                                            id="FK_CodigoCitaMedica" value="<?php echo $obj->FK_CodigoCitaMedica; ?>"
                                            readOnly maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">DNI Propietario</label>
                                        <input class="form-control" type="text" name="FK_DocumentoPropietario"
                                            id="FK_DocumentoPropietario" readOnly
                                            value="<?php echo $obj->FK_DocumentoPropietario; ?>" maxlength="30">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Codigo Mascota</label>
                                        <input class="form-control" type="text" name="FK_CodigoMascota"
                                            id="FK_CodigoMascota" readOnly value="<?php echo $obj->FK_CodigoMascota; ?>"
                                            maxlength="30">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label"></label>
                                        <input class="form-control" type="date" name="Fecha_CitaMedica"
                                            id="Fecha_CitaMedica" value="<?php echo $obj->Fecha_CitaMedica;?>"
                                            maxlength="40" readOnly>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Observaciones </label>
                                        <textarea class="form-control" type="text-area" name="Observacion_CitaMedica" id="Observacion_CitaMedica"  rows="7" cols="60" readOnly ><?php echo $obj->Observacion_CitaMedica;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <!--boton para subir informacion-->
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-danger btn-raised btn-sm" id="eliminar" name="eliminar"><i
                                class="zmdi zmdi-"></i>ELIMINAR</button>
                    </p>
                </form>

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