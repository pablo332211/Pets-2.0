<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/Modelo/modelo_Profilactico.php";
    include "../../../Modelo/Modelo/modelo_ProfilacticoMascota.php";
?>

<?php
    if($_POST['agregar']){
        $obj = new ProfilacticoMascota;
       // $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];  
    } 
?>

<?php
    $obj = new ProfilacticoMascota;
    $obj = new Profilactico;

//---------------------------------------LISTAR TABLA PROPIETARIO---------------------------------------//
    if (isset($_POST['consulta'])) {
        $obj->Codigo_Profilactico;
        $obj->Nombre_Profilactico = $_POST['Nombre_Profilactico'];
        $obj->Presentacion_Profilactico = $_POST['Presentacion_Profilactico'];
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];

        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $query = "SELECT Codigo_Profilactico,Nombre_Profilactico, Presentacion_Profilactico, Codigo_Mascota FROM profilactico , mascota WHERE Nombre_Profilactico = '$obj->Nombre_Profilactico' AND Presentacion_Profilactico = '$obj->Presentacion_Profilactico' AND Codigo_Mascota = '$obj->FK_CodigoMascota' ";
        $resultado = mysqli_query($conecta, $query);
            if($arreglo = mysqli_fetch_row($resultado)){
                echo "<script> alert('Profilactico encontrado y cargado correctamente')</script>";
                $obj->Codigo_Profilactico = $arreglo[0];
                $obj->Nombre_Profilactico = $arreglo[1];
                $obj->Presentacion_Profilactico = $arreglo[2];
                $obj->FK_CodigoMascota = $arreglo[3];
            }
            else{
?>
                    <script> 
                            result = window.confirm("El profilactico no creado, DESEA CREAR ESTE PROFILACTICO?")
                                if(result == true){
                                    <?php
                                        $insertar = "INSERT INTO profilactico VALUES (NULL,'$obj->Nombre_Profilactico','$obj->Presentacion_Profilactico')";
                                        mysqli_query($conecta,$insertar);
                                    ?>
                                    alert("Profilactico Cargado a la base de Datos")
                                }
                    </script>
<?php 
            }
    } 
    else {
            $obj->FK_CodigoMascota="";
            $obj->Nombre_Profilactico="";
            $obj->Presentacion_Profilactico="";
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
                        <a href="../cuenta/mi_cuenta.php" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../desk_full.php" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../desk.php" title="Salir del sistema">
                            <i class="zmdi zmdi-mail-reply-all"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Historia clinica <i
                            class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="../citas_medicas/citas_medicas.php">
                                <i class="zmdi zmdi-folder"></i> Cita medica
                            </a>
                        </li>
                        <li>
                            <a href="../formula_medica/formula_medica.php">
                                <i class="zmdi zmdi-folder"></i> Formula medica
                            </a>
                        </li>
                        <li>
                            <a href="../examenes/examenes.php">
                                <i class="zmdi zmdi-folder"></i> Exámenes
                            </a>
                        </li>
                        <li>
                            <a href="../agendar_cita/agendar_cita.php">
                                <i class="zmdi zmdi-folder"></i> Agendar cita
                            </a>
                        </li>
                        <li>
                            <a href="../hospitalizaciones/hospitalizaciones.php">
                                <i class="zmdi zmdi-folder"></i> Hospitalizaciones
                            </a>
                        </li>
                        <li>
                            <a href="../vacunacion_desparacitacion/vacunacion_y_desparacitacion.php">
                                <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                            </a>
                        </li>
                        <li>
                            <a href="../cirugias/cirugias.php">
                                <i class="zmdi zmdi-folder"></i> Cirugía
                            </a>
                        </li>
                        <li>
                            <a href="../remisiones/remisiones.php">
                                <i class="zmdi zmdi-folder"></i> Remisiones
                            </a>
                        </li>
                        <li>
                            <a href="../certificaciones/certificaciones.php">
                                <i class="zmdi zmdi-folder"></i> Certificaciones
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
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
                <h1 class="text-titles">Vacunanción o desparacitación</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="vacunacion_y_desparacitacion.php" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA VACUNACION Y DESPARACITACIÓN
                        </a>
                    </li>
                    <li>
                        <a href="vacunacion_y_desparacitacion-buscar.php" class="btn btn-success">
                            <i class="zmdi zmdi-search">
                            </i> &nbsp; BUSCAR VACUNACION Y DESPARACITACIÓN
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
                                        <input class="form-control" type="text" name="FK_CodigoMascota" id="FK_CodigoMascota" value="<?php echo $obj->FK_CodigoMascota?>" size="40">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre Profilactico</label>
                                        <input class="form-control" type="text" name="Nombre_Profilactico" id="Nombre_Profilactico" value="<?php echo $obj->Nombre_Profilactico?>"size="40">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Presentacion Profilactico</label>
                                        <input class="form-control" type="text" name="Presentacion_Profilactico" id="Presentacion_Profilactico"value="<?php echo $obj->Presentacion_Profilactico?>"size="40">
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
                                                <input class="form-control" type="text" name="Dosis_ProfilacticoMascota"
                                                    id="Dosis_ProfilacticoMascota" size="40" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Administracion</label>
                                                <input class="form-control" type="text"
                                                    name="Administracion_ProfilacticoMascota"
                                                    id="Administracion_ProfilacticoMascota" size="40" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" > 
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
                                                <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  name="Observacion_ProfilacticoMascota" id="Observacion_ProfilacticoMascota" rows="7" cols="60" required maxlength="400"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="FK_CodigoMascota" id="FK_CodigoMascota" value="<?php echo $obj->FK_CodigoMascota?>" readOnly size="30">
                                    <input type="hidden" name="FK_CodigoProfilactico" id="FK_CodigoProfilactico" value="<?php echo $obj->Codigo_Profilactico; ?>" readOnly size="30">
                                    <p class="text-center" style="margin-top: 20px;">
                                        <button type="submit" name ="agregarProf"class="btn btn-info btn-raised btn-m"><i
                                                class="zmdi zmdi-save"></i>&nbsp;GUARDAR</button>
                                        <a href="javascript: history.go(-1)">
                                        </a>
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