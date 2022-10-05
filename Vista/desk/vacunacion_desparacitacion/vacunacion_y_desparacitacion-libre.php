<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_Profilactico.php";
    include "../../../Modelo/modelo_ProfilacticoMascota.php";
    
    $DocM=$_GET['DocM'];
    //echo $DocM;

    if(isset($_POST['agregar'])){
        $obj = new ProfilacticoMascota;

        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];  
    }
    else{
        $obj->FK_CodigoMascota = "";
        $obj->FK_CodigoProfilactico = "";
        $obj->Fecha_ProfilacticoMascota= "";
        $obj->Dosis_ProfilacticoMascota= "";
        $obj->Administracion_ProfilacticoMascota= "";
        $obj->Observacion_ProfilacticoMascota= ""; 
    }
//---------------------------------------LISTAR TABLA PROPIETARIO---------------------------------------//
    if (isset($_POST['consulta'])) {
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];

        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $query = "SELECT Codigo_Mascota FROM Mascota WHERE Codigo_Mascota = '$obj->FK_CodigoMascota' ";
        $resultado = mysqli_query($conecta, $query);
        $arregloM= mysqli_fetch_row($resultado);
            $obj->FK_CodigoMascota = $arregloM[0];

        $obj = new Profilactico;

        $obj->Codigo_Profilactico = $_POST['Codigo_Profilactico'];
        $obj->Nombre_Profilactico = $_POST['Nombre_Profilactico'];
        $obj->Presentacion_Profilactico = $_POST['Presentacion_Profilactico'];

        
        $query = "SELECT Codigo_Profilactico,Nombre_Profilactico, Presentacion_Profilactico FROM profilactico WHERE Nombre_Profilactico = '$obj->Nombre_Profilactico' ";
        $resultado = mysqli_query($conecta, $query);
        $arreglo= mysqli_fetch_row($resultado);
            $obj->Codigo_Profilactico = $arreglo[0];
            $obj->Nombre_Profilactico = $arreglo[1];
            $obj->Presentacion_Profilactico = $arreglo[2];
    }
    else{
        $arregloM[0]="";
        $obj->Codigo_Profilactico = "";
        $obj->Nombre_Profilactico =  "";
        $obj->Presentacion_Profilactico = "";
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
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "vacunacion_y_desparacitacion-libre.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA VACUNACION Y DESPARACITACIÓN
                        </a>
                    </li>
                    <li>
                    <a href="<?php echo "vacunacion_y_desparacitacion-buscar-libre.php?DocM=".urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR VACUNACION Y DESPARACITACIÓN
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Consultar Usuarios</h3>
                </div>
                <form action="" method="POST">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <tr>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Codigo Mascota</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="FK_CodigoMascota" id="FK_CodigoMascota" value="<?php echo $arregloM[0]?>" size="40">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre Profilactico</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Nombre_Profilactico" id="Nombre_Profilactico" value="<?php echo $obj->Nombre_Profilactico?>"size="40">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Presentacion Profilactico</label>
                                        <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Presentacion_Profilactico" id="Presentacion_Profilactico"value="<?php echo $obj->Presentacion_Profilactico?>"size="40">
                                    </div>
                                </div>
                                    <input type="hidden" name="Codigo_Profilactico" id="Codigo_Profilactico" value="<?php echo $obj->Codigo_Profilactico; ?>" readOnly size="30">
                                    <td><button class="btn btn-info btn-raised btn-sm" name="consulta" type="submit">CONSULTAR</button></td>
                                </tr>
                            </table>
                        </div>
                     </div>
                </form>
            </div> 
        </div>

        
        <!--formulario-->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Datos</h3>
                </div>
                <form action="" method="POST">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <fieldset>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Dosis </label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Dosis_ProfilacticoMascota"
                                                    id="Dosis_ProfilacticoMascota" maxlength="20"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Administracion</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text"
                                                    name="Administracion_ProfilacticoMascota"
                                                    id="Administracion_ProfilacticoMascota" maxlength="25"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input pattern="[0-9-]{1,30}" class="form-control" type="date"
                                                    name="Fecha_ProfilacticoMascota" id="Fecha_ProfilacticoMascota" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Observaciones
                                                </legend>
                                                <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" name="Observacion_ProfilacticoMascota" id="Observacion_ProfilacticoMascota" rows="7" cols="60" maxlength="400" required ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="FK_CodigoMascota" id="FK_CodigoMascota" value="<?php echo $arregloM[0]?>" readOnly size="30">
                                    <input type="hidden" name="FK_CodigoProfilactico" id="FK_CodigoProfilactico" value="<?php echo $obj->Codigo_Profilactico; ?>" readOnly size="30">
                                    <p class="text-center" style="margin-top: 20px;">
                                        <button type="submit" name ="agregar"class="btn btn-info btn-raised btn-m"><i class="zmdi zmdi-save"></i>&nbsp;GUARDAR</button>
                                    </p>
                            </fieldset>
                        </div>
                    </div>
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