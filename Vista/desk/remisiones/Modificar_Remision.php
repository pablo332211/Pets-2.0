<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_Remision.php";
?>


<?php
    $DocM=$_GET['DocM'];
    $llave = $_GET['CodHC'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

?>

<?php
$obj = new remision();

if (isset($_POST['modificar'])) {
    $obj->Codigo_Remision = $_POST['Codigo_Remision'];
    $obj->Fecha_Remision = $_POST['Fecha_Remision'];
    $obj->Especialista_Remision = $_POST['Especialista_Remision'];
    $obj->Celular_Remision = $_POST['Celular_Remision'];
    $obj->Entidad_Remision = $_POST['Entidad_Remision'];
    $obj->Observacion_Remision = $_POST['Observacion_Remision'];
}
?>

<?php
$CodR = $_GET['CodR'];
//echo $llave;
$clas = new Conexion();
$conecta = $clas->conectarServidor();
$query = "SELECT * FROM remision WHERE Codigo_Remision = '$CodR'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->Codigo_Remision = $arreglo[0];
$obj->Fecha_Remision = $arreglo[1];
$obj->Especialista_Remision = $arreglo[2];
$obj->Celular_Remision = $arreglo[3];
$obj->Entidad_Remision = $arreglo[4];
$obj->Observacion_Remision = $arreglo[5];

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
                            <a href="../cuenta/mi_cuenta.php?key=<?php echo urlencode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="./Remisiones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
                                <i class="zmdi zmdi-mail-reply-all"></i>
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
                                <a href="../agendar_cita/AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Agendar cita
                                </a>
                            </li>
                            <li>
                                <a href="../citas_medicas/citas_medicas.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
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
                           <!--  <li>
                                <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Certificaciones
                                </a>
                            </li> -->
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
                <h1 class="text-titles">Modificar Remision de <?php echo $arregloHC[2] ?></h1>
            </div>
        </div>

        <!-- Formulario -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-edit"></i>&nbsp; DATOS REMISION</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" id="">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo Remision</label>
                                            <input class="form-control" type="text" name="Codigo_Remision" id="Codigo_Remision" value="<?php echo $obj->Codigo_Remision ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Fecha Remision</label>
                                            <input class="form-control" type="date" name="Fecha_Remision" id="Fecha_Remision" value="<?php echo $obj->Fecha_Remision ?>">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Especialista Remision</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Especialista_Remision" id="Especialista_Remision" value="<?php echo $obj->Especialista_Remision ?>" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Celular</label>
                                            <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="Celular_Remision" id="Celular_Remision" value="<?php echo $obj->Celular_Remision ?>" maxlength="45">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Entidad Remision</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Entidad_Remision" id="Entidad_Remision" value="<?php echo $obj->Entidad_Remision ?>" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion Remision </label>
                                            <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Observacion_Remision" id="Observacion_Remision" maxlength="400" size="40" rows="7"><?php echo $obj->Observacion_Remision; ?></textarea>
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