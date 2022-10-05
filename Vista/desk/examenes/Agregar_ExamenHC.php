<?php
    include  "../../../Conexion/conexion.php";
    include  "../../../Modelo/modelo_examen.php";
    include  "../../../Modelo/modelo_HistoriaClinicaExamen.php";
?>

<?php
$llave = $_GET['key'];
$DocM = $_GET['DocM'];
echo $llave;

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

    if(isset($_POST['agregar'])){
        $obj = new HistoriaClinica_Examen;
        $obj = new examen;
        $obj->Fecha_Examen = $_POST['Fecha_Examen'];
        $obj->Tipo_Examen = $_POST['Tipo_Examen'];
        $obj->Correo_Examen = $_POST['Correo_Examen'];
        $obj->Resultado_Examen = $_POST['Resultado_Examen'];
        $obj->Observacion_Examen = $_POST['Observacion_Examen'];

        $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
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
                        <li>
                            <a href="Examenes_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historia Clinica">
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
                    <a href="search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

            <!-- Content page -->
            <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Examenes</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Listar_ExamenHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; LISTAR EXAMENES
                        </a>
                    </li>
                    <li>
                        <a href="Agregar_ExamenHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVO EXAMEN
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Generar Examen</h3>
                    </div>
                    <form method="POST" action="">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <input class="form-control"  required type="date" name="Fecha_Examen" id="Fecha_Examen" >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo Examen </label>
                                            <input class="form-control"  required  pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" maxlength="45" type="text" name="Tipo_Examen" id="Tipo_Examen" >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo Examen </label>
                                            <input class="form-control" required  maxlength="45" type="email" name="Correo_Examen" id="Correo_Examen">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Resultado Examen </label>
                                            <input class="form-control" required  pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" maxlength="45" type="text" name="Resultado_Examen" id="Resultado_Examen" >
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion Examen </label>
                                            <textarea class="form-control" required pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,4OO}" maxlength="45" type="text" name="Observacion_Examen" id="Observacion_Examen"  size="40" rows="7" cols="60"></textarea>
                                        </div>
                                    </div>
                                        <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $llave?>" readOnly size="30">
                                        <td><button class="btn btn-info btn-raised btn-sm" name="agregar" type="submit">GENERAR EXAMEN</button></td>        </tr>
                                </table>
                            </div>
                        </div>
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