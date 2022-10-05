<?php 
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_ProfilacticoMascota.php";
?>
<?php
    $DocM=$_GET['DocM'];
    
    if(isset($_POST['eliminar'])){
        $obj = new ProfilacticoMascota();

        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->Dosis_ProfilacticoMascota = $_POST['Dosis_ProfilacticoMascota'];
        $obj->Fecha_ProfilacticoMascota = $_POST['Fecha_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota = $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota = $_POST['Observacion_ProfilacticoMascota'];

        $obj->FK_CodigoMascota = "";
        $obj->FK_CodigoProfilactico = "";
        $obj->Dosis_ProfilacticoMascota = "";        
        $obj->Fecha_ProfilacticoMascota= "";
        $obj->Administracion_ProfilacticoMascota= ""; 
        $obj->Observacion_ProfilacticoMascota= ""; 
    }
    else{
        $Masc=$_GET['Masc'];
        $Prof=$_GET['Prof'];

        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $query = "SELECT * FROM profilactico_mascota WHERE FK_CodigoMascota= '$Masc' AND FK_CodigoProfilactico = '$Prof'";
            echo $query;
            $resultado = mysqli_query($conecta,$query);
            $arreglo = mysqli_fetch_row($resultado);
            
            $obj->FK_CodigoMascota = $arreglo[0];
            $obj->FK_CodigoProfilactico = $arreglo[1];
            $obj->Fecha_ProfilacticoMascota = $arreglo[2];
            $obj->Dosis_ProfilacticoMascota = $arreglo[3];
            $obj->Administracion_ProfilacticoMascota = $arreglo[4];
            $obj->Observacion_ProfilacticoMascota = $arreglo[5];
    }
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
                            <a href="<?php echo "vacunacion_y_desparacitacion-buscar-libre.php?DocM=".urldecode($DocM)?>" title="Historias Clinicas">
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
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; ELIMINAR PROFILACTICOS</h3>
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
                                                value="<?php echo $obj->FK_CodigoMascota ?>"  readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo Profilactico</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="FK_CodigoProfilactico" id="FK_CodigoProfilactico"
                                                value="<?php echo $obj->FK_CodigoProfilactico ?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input pattern="[0-9-]{1,30}" class="form-control" type="date"
                                                name="Fecha_ProfilacticoMascota" id="Fecha_ProfilacticoMascota" value="<?php echo $obj->Fecha_ProfilacticoMascota ?>" readOnly required=""
                                                maxlength="30">
                                        </div>
                                    </div>
                                    <div class=" col-xs-12 col-sm-6">
                                        <div class=" form-group label-floating">
                                            <label class="control-label">Dosis</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Dosis_ProfilacticoMascota" id="Dosis_ProfilacticoMascota"
                                                value="<?php echo $obj->Dosis_ProfilacticoMascota ?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Administracion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Administracion_ProfilacticoMascota"
                                                id="Administracion_ProfilacticoMascota"
                                                value="<?php echo $obj->Administracion_ProfilacticoMascota?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion Medicamento </label>
                                            <textarea class="form-control" type="text-area" name="Observacion_ProfilacticoMascota" id="Observacion_ProfilacticoMascota"  rows="7" cols="60" required readOnly ><?php echo $obj->Observacion_ProfilacticoMascota?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" name="eliminar" id="eliminar"
                                class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-"></i>Eliminar
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