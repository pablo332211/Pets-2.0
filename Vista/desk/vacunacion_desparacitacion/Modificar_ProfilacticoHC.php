<?php 
    include "../../../Conexion/conexion.php";
    include "$../../../Modelo/modelo_ProfilacticoMascota.php";
?>
<?php
    //--------------------- OBJETO PROFILACTICO_MASCOTA-------------------------------
    $obj = new ProfilacticoMascota();
    //------------------ ATRIBUTOS PROFILACTICO_MASCOTA ------------------------//
    if($_POST){
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];
    }
?>

<?php

$DocM=$_GET['DocM'];
$llave=$_GET['CodHC'];
$CodFM=$_GET['CodFM'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();

    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

    $query = "SELECT * FROM profilactico_mascota WHERE FK_CodigoMascota= '$arregloHC[1]' AND FK_CodigoProfilactico = '$CodFM'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->FK_CodigoMascota = $arreglo[0];
    $obj->FK_CodigoProfilactico = $arreglo[1];
    $obj->Fecha_ProfilacticoMascota = $arreglo[2];
    $obj->Dosis_ProfilacticoMascota = $arreglo[3];
    $obj->Administracion_ProfilacticoMascota = $arreglo[4];
    $obj->Observacion_ProfilacticoMascota = $arreglo[5];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>V y D </title>
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
                            <a href="VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
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
                            <!-- <li>
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
                <h1 class="text-titles">Vacunanción y desparacitación</h1>
            </div>
        </div>
        <!--cita medica -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-edit"></i> &nbsp; MODIFICAR PROFILACTICOS</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" id="">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo Mascota </label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="FK_CodigoMascota" id="FK_CodigoMascota"
                                                value="<?php echo $obj->FK_CodigoMascota ?>" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo Profilactico</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="FK_CodigoProfilactico" id="FK_CodigoProfilactico"
                                                value="<?php echo $obj->FK_CodigoProfilactico ?>" size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input pattern="[0-9-]{1,30}" class="form-control" type="date"
                                                name="Fecha_ProfilacticoMascota" id="Fecha_ProfilacticoMascota" value="<?php echo $obj->Fecha_ProfilacticoMascota ?>" required=""
                                                maxlength="30">
                                        </div>
                                    </div>
                                    <div class=" col-xs-12 col-sm-6">
                                        <div class=" form-group label-floating">
                                            <label class="control-label">Dosis</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Dosis_ProfilacticoMascota" id="Dosis_ProfilacticoMascota"
                                                value="<?php echo $obj->Dosis_ProfilacticoMascota ?>" size="40" maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Administracion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Administracion_ProfilacticoMascota"
                                                id="Administracion_ProfilacticoMascota"
                                                value="<?php echo $obj->Administracion_ProfilacticoMascota?>" size="40" maxlength="30">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Observaciones</legend>
                                            <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}"  type="text" name="Observacion_ProfilacticoMascota"
                                                id="Observacion_ProfilacticoMascota"
                                                 size="40"
                                                rows="7" cols="60" required maxlength="400"><?php echo $obj->Observacion_ProfilacticoMascota?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" name="modificar" id="modificar"
                                class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-"></i>Modificar
                                Profilactico</button>
                        </p>
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