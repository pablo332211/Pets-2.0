<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_Bitacora.php";
    include "../../../Modelo/modelo_HospitalizacionBitacora.php";
?>

<?php
$DocM =$_GET['DocM'];
$llave = $_GET['key'];
$CodH = $_GET['CodH'];

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
        $obj = new Hospitalizacion_Bitacora;
        $obj = new Bitacora;

        $obj->FechaActual_Bitacora = $_POST['FechaActual_Bitacora'];
        $obj->FormMedTratada_Bitacora = $_POST['FormMedTratada_Bitacora'];
        $obj->Temperatura_Bitacora = $_POST['Temperatura_Bitacora'];
        $obj->FrecCardiaca_Bitacora = $_POST['FrecCardiaca_Bitacora'];
        $obj->FrecRespiratoria_Bitacora = $_POST['FrecRespiratoria_Bitacora'];
        $obj->ColorMucosa_Bitacora = $_POST['ColorMucosa_Bitacora'];
        $obj->Apetito_Bitacora = $_POST['Apetito_Bitacora'];
        $obj->Sed_Bitacora = $_POST['Sed_Bitacora'];
        $obj->EstadoAnimo_Bitacora = $_POST['EstadoAnimo_Bitacora'];
        $obj->Vomito_Bitacora = $_POST['Vomito_Bitacora'];
        $obj->Orina_Bitacora = $_POST['Orina_Bitacora'];
        $obj->GradoHidratacion_Bitacora = $_POST['GradoHidratacion_Bitacora'];
        $obj->Observacion_Bitacora = $_POST['Observacion_Bitacora'];

        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];
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
                            <a href="../cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php  echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
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
                                <a href="../citas_medicas/CitaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
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
                            <li>
                                <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Certificaciones
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
                <h1 class="text-titles">Hospitalizaciones </h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Modificar_HospitalizacionHC.php?key=<?php echo urldecode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; LISTAR BITACORAS
                        </a>
                    </li>
                    <li>
                        <a href="Agregar_BitacoraModificarHC.php?key=<?php echo urldecode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus">
                            </i> &nbsp; NUEVA BITACORA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR BITACORA</h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <input class="form-control" type="date" required name="FechaActual_Bitacora" id="FechaActual_Bitacora"size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Formula Medica</label>
                                            <input class="form-control" type="text" maxlength="100" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,100}" required name="FormMedTratada_Bitacora" id="FormMedTratada_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Temperatura</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Temperatura_Bitacora" id="Temperatura_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Cardiaca</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="FrecCardiaca_Bitacora" id="FrecCardiaca_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Respiratoria</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="FrecRespiratoria_Bitacora" id="FrecRespiratoria_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Color Mucosa</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="ColorMucosa_Bitacora" id="ColorMucosa_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Apetito</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Apetito_Bitacora" id="Apetito_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sed</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Sed_Bitacora" id="Sed_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado Animo</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="EstadoAnimo_Bitacora" id="EstadoAnimo_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Vomito </label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Vomito_Bitacora" id="Vomito_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Orina</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Orina_Bitacora" id="Orina_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Grado Hidratacion</label>
                                            <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="GradoHidratacion_Bitacora" id="GradoHidratacion_Bitacora" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion</label>
                                            <textarea class="form-control" type="text" maxlength="200" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,200}" required name="Observacion_Bitacora" id="Observacion_Bitacora" size="40" rows="7"></textarea>
                                        </div>
                                    </div>                             
                                        <input type="hidden" name="FK_CodigoHospitalizacion" id="FK_CodigoHospitalizacion" value="<?php echo $CodH?>" readOnly size="30">
                                        <td><button class="btn btn-info btn-raised btn-sm" name="agregar" type="submit">AGREGAR BITACORA</button></td>
                                    </tr>
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