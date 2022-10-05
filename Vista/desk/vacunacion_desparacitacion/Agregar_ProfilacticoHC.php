<?php
    include "../../../Conexion/conexion.php";
    include "../../../modelo_Profilactico.php";
    include "../../../modelo_ProfilacticoMascota.php";
?>

<?php
$llave = $_GET['key'];
$DocM = $_GET['DocM'];
//echo $llave;
    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

    if(isset($_POST['consulta'])){
        $obj = new Profilactico;

        $obj->Nombre_Profilactico = $_POST["Nombre_Profilactico"] ;
        $obj->Presentacion_Profilactico = $_POST["Presentacion_Profilactico"] ;
    
        $query = "SELECT * FROM  profilactico WHERE Nombre_Profilactico = '$obj->Nombre_Profilactico' AND Presentacion_Profilactico = '$obj->Presentacion_Profilactico'";
        echo $query;
        $resultado = mysqli_query($conecta, $query);
        $arreglo = mysqli_fetch_row($resultado);

        $obj->Codigo_Profilactico = $arreglo[0];
        $obj->Nombre_Profilactico = $arreglo[1];
        $obj->Presentacion_Profilactico = $arreglo[2];
    }
    else{
        $obj->Codigo_Profilactico = "";
        $obj->Nombre_Profilactico = "" ;
        $obj->Presentacion_Profilactico = "" ;
    }


    if(isset($_POST['agregar'])){
        $obj = new ProfilacticoMascota;

        $obj->FK_CodigoMascota = $_POST["FK_CodigoMascota"];
        $obj->FK_CodigoProfilactico = $_POST["FK_CodigoProfilactico"];

        $obj->Fecha_ProfilacticoMascota = $_POST["Fecha_ProfilacticoMascota"];
        $obj->Dosis_ProfilacticoMascota = $_POST["Dosis_ProfilacticoMascota"];
        $obj->Administracion_ProfilacticoMascota = $_POST["Administracion_ProfilacticoMascota"];
        $obj->Observacion_ProfilacticoMascota = $_POST["Observacion_ProfilacticoMascota"];

        $obj->Codigo_Profilactico = "";
        $obj->Nombre_Profilactico = "" ;
        $obj->Presentacion_Profilactico = "" ;
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
                            <a href="../cuenta/mi_cuenta.php" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="escritorio">
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
                <h1 class="text-titles">Formula Medica</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Agregar_ProfilacticoHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus">
                            </i> &nbsp; NUEVO PROFILACTICO
                        </a>
                    </li>
                    <li>
                        <a href="VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; LISTAR PROFILACTICO
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>

        
        <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Consultar Medicamento</h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre Profilactico</label>
                                                <input  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Nombre_Profilactico" id="Nombre_Profilactico" required value="<?php echo$obj->Nombre_Profilactico?>" size="40" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Presentacion Profilactico</label>
                                                <input  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Presentacion_Profilactico" id="Presentacion_Profilactico" required value="<?php echo $obj->Presentacion_Profilactico?>" size="40" maxlength="40">
                                            </div>
                                        </div>
                                        <td><button class="btn btn-info btn-raised btn-sm" name="consulta" type="submit">CONSULTAR</button></td> 
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <input class="form-control" type="date" name="Fecha_ProfilacticoMascota" id="Fecha_ProfilacticoMascota"  size="40" >
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Dosis Profilactico</label>
                                                <input  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Dosis_ProfilacticoMascota" id="Dosis_ProfilacticoMascota"  size="40" maxlength="30">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Administracion Profilactico</label>
                                                <input  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Administracion_ProfilacticoMascota" id="Administracion_ProfilacticoMascota"  size="40" maxlength="30">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Observacion Profilactico </label>
                                                <textarea  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text-area" name="Observacion_ProfilacticoMascota" id="Observacion_ProfilacticoMascota"  rows="7" cols="60" required maxlength="400" ></textarea>
                                            </div>
                                        </div>
                                            <input type="hidden" name="FK_CodigoMascota" id="FK_CodigoMascota" value="<?php echo $arregloHC[1]; ?>" readOnly size="30">
                                            <input type="hidden" name="FK_CodigoProfilactico" id="FK_CodigoProfilactico" value="<?php echo $obj->Codigo_Profilactico;?>" readOnly size="30">
                                            <td><button class="btn btn-info btn-raised btn-sm" name="agregar" type="submit">Agregar Medicamento</button></td> 
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