<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_CitaMedica.php";
    include "../../../Modelo/modelo_CitaMedicaPropietario.php";
    include "../../../Modelo/modelo_CitaMedicaMascota.php";
?>

<?php
    $DocM=$_GET['DocM'];
    
    $obj = new citaMedica_Mascota();
    $obj = new CitaMedica_Propietario();

    if($_POST){ 
        $obj->FK_DocumentoPropietario =$_POST['FK_DocumentoPropietario'];
        $obj->FK_CodigoCitaMedica=$_POST['FK_CodigoCitaMedica'];
        $obj->Fecha_CitaMedica= $_POST['Fecha_CitaMedica'];
        $obj->Observacion_CitaMedica= $_POST['Observacion_CitaMedica'];

        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->FK_CodigoCitaMedica= $_POST['FK_CodigoCitaMedica']; 
    }

    if (isset($_POST['agregar'])) {
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $query = "SELECT Codigo_CitaMedica FROM cita_medica ORDER BY Codigo_CitaMedica DESC LIMIT 1";
        $resultado = mysqli_query($conecta, $query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->FK_CodigoCitaMedica = $arreglo[0];
        echo "<script> alert('la cita medica fue creada con exito y su codigo es: '+ ' $obj->FK_CodigoCitaMedica ')</script>";
    } 
    else {
        $obj->FK_CodigoCitaMedica = "";
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agendar Cita</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                            <i class="zmdi zmdi-folder"></i>Historia clinica
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Agendar citas 
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
                <h1 class="text-titles">AGENDAR CITA MEDICA</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGENDAR CITA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=".urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search">
                            </i> &nbsp; BUSCAR AGENDA
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Formulario -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-"></i> &nbsp; INGRESE LOS DATOS </h3>
                </div>
                <div class="panel-body">
                    <form method="POST">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">DNI / Cedula del propietario</label>
                                            <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="FK_DocumentoPropietario" id="FK_DocumentoPropietario" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codig mascota</label>
                                            <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="FK_CodigoMascota" id="FK_CodigoMascota" required maxlength="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Observaciones</label>
                                        <br>
                                        <textarea  pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  type="text" name="Observacion_CitaMedica" id="Observacion_CitaMedica" rows="7" cols="60" required maxlength="400"></textarea>
                                    </div>
				    		    </div>
                            <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input pattern="[0-9-]{1,30}" class="form-control" type="date" name="Fecha_CitaMedica" id="Fecha_CitaMedica" required maxlength="">
                                        </div>
                            </div>
                            <div class="col-xs-12 col-sm-12">
                            <p class="text-center" style="margin-top: 20px;">
                                <td>
                                    <input type="hidden" name="FK_CodigoCitaMedica" id="FK_CodigoCitaMedica" value="<?php echo $obj->FK_CodigoCitaMedica; ?>" readOnly size="">
                                    <button type="submit" name="agregar" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-"></i> Crar cita medica</button>
                                </td>
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