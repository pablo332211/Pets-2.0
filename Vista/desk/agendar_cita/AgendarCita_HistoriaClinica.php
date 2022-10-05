<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_CitaMedicaMascota.php";
    include "../../../Modelo/modelo_CitaMedica.php";
    include "../../../Modelo/modelo_CitaMedicaPropietario.php";
?>

<?php
$DocM = $_GET['DocM'];
$llave = $_GET['key'];
echo $llave;

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

    $query = "SELECT FK_DocumentoPropietario FROM mascota WHERE Codigo_Mascota = '$obj->FK_CodigoMascota'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->FK_DocumentoPropietario =$arreglo[0];

?>

<?php

if (isset($_POST['agregar'])) {
    $obj = new citaMedica_Mascota();
    $obj = new citaMedica_Propietario();

    $obj->FK_DocumentoPropietario = $_POST['FK_DocumentoPropietario'];
    $obj->FK_CodigoCitaMedica = $_POST['FK_CodigoCitaMedica'];
    $obj->Fecha_CitaMedica = $_POST['Fecha_CitaMedica'];
    $obj->Observacion_CitaMedica = $_POST['Observacion_CitaMedica'];

    $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
    $obj->FK_CodigoCitaMedica = $_POST['FK_CodigoCitaMedica'];

    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT Codigo_CitaMedica FROM cita_medica ORDER BY Codigo_CitaMedica DESC LIMIT 1";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->FK_CodigoCitaMedica = $arreglo[0];
    echo "<script> alert('la cita medica fue creada con exito y su codigo es: '+ ' $obj->FK_CodigoCitaMedica ')</script>";
} else {
    $obj->FK_CodigoCitaMedica = "";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>desk_full</title>
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
                            <a href="../desk/cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SideBar Menu -->
                <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                    <li>
                        <a href="#!" class="btn-sideBar-SubMenu">
                            <i class="zmdi zmdi-case zmdi-hc-fw"></i> Historia clinica <i class="zmdi zmdi-caret-down pull-right"></i>
                        </a>
                        <ul class="list-unstyled full-box">
                            <li>
                                <a href="../citas_medicas/ListarCitaMedica_HC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Cita medica
                                </a>
                            </li>
                            <li>
                                <a href="../formula_medica/FormulaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Formula medica
                                </a>
                            </li>
                            <li>
                                <a href="../examenes/Examenes_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Exámenes
                                </a>
                            </li>
                            <li>
                                <a href="../agendar_cita/AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Agendar cita
                                </a>
                            </li>
                            <li>
                                <a href="../hospitalizaciones/Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Hospitalizaciones
                                </a>
                            </li>                                           
                            <li>
                                <a href="../vacunacion_desparacitacion/VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                                </a>
                            </li>
                            <li>
                                <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Cirugía
                                </a>
                            </li>
                            <li>
                                <a href="../remisiones/Remisiones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Remisiones
                                </a>
                            </li>
                        </ul>    
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
                <h1 class="text-titles">Agendar Cita Medica a <?php echo $arregloHC[2]?></h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href= "AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGENDAR CITA MEDICA
                        </a>
                    </li>
                    <li>
                        <a href= "Listar_AgendarCitaHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CITAS MEDICAS
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--Formulario -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; AGENDAR CITA MEDICA</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" id="" name="">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cod de la mascota</label>
                                            <input class="form-control" type="text" name="FK_CodigoMascota"
                                                id="FK_CodigoMascota" value= "<?php echo $obj->FK_CodigoMascota?>" readOnly maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input pattern="[0-9-]{1,30}" class="form-control" type="date" name="Fecha_CitaMedica" id="Fecha_CitaMedica" required maxlength="">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Observaciones</label>
                                        <br>
                                        <textarea  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  type="text" name="Observacion_CitaMedica" id="Observacion_CitaMedica" rows="7" cols="60" required maxlength="400"></textarea>
                                    </div>
				    		    </div>
                                </div> <br> <br>
                                <p class="text-center">
                                    <input type="hidden" name="FK_DocumentoPropietario" id="FK_DocumentoPropietario" value="<?php echo $obj->FK_DocumentoPropietario; ?>" readOnly size="30">
                                    <input type="hidden" name="FK_CodigoCitaMedica" id="FK_CodigoCitaMedica" value="<?php echo $obj->FK_CodigoCitaMedica; ?>" readOnly size="30">
                                    <button type="submit" id="agregar" name="agregar" class="btn btn-info btn-raised btn-m"><i class="zmdi zmdi"></i>AGENDAR</button>
                                </p>
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