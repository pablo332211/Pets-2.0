<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_Mascota.php";
include "../../../Modelo/modelo_HistoriaClinica.php";

?>

<?php
$DocM=$_GET['DocM'];

$obj=new historia_clinica;
$obj =new Mascota;

if (isset($_POST['agregar'])) {
    $obj->FK_DocumentoMedico = $_POST['Documento_Medico']; 

    $obj->Nombre_Mascota = $_POST['Nombre_Mascota'];
    $obj->Edad_Mascota = $_POST['Edad_Mascota'];
    $obj->FK_EspecieMascota = $_POST['FK_EspecieMascota'];
    $obj->FK_GeneroMascota = $_POST['FK_GeneroMascota'];
    $obj->Color_Mascota = $_POST['Color_Mascota'];
    $obj->Observacion_Mascota = $_POST['Observacion_Mascota'];
    $obj->FK_DocumentoPropietario = $_POST['Documento_Propietario'];
}

//---------------------------------------LISTAR TABLA PROPIETARIO---------------------------------------//
if (isset($_POST['consulta'])) {
    $obj->FK_DocumentoPropietario = $_POST['Documento_Propietario'];
    //echo "<script>alert('llegue prop')</script>";
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT COUNT(*) total FROM propietario WHERE documento_Propietario LIKE '$obj->FK_DocumentoPropietario' ";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_assoc($resultado);
    if ($arreglo["total"] != 0) {
        echo "<script> alert('Propietario Encontrado')</script>";
    } else {
        echo "<script> alert('El propietario no se encuentra en la base de datos')</script>";
    }
    $query = "SELECT documento_Propietario FROM propietario WHERE documento_Propietario = '$obj->FK_DocumentoPropietario'";
    $result = mysqli_query($conecta, $query);
    $var = mysqli_fetch_row($result);
    $obj->FK_DocumentoPropietario = $var[0];
} 
else {
    $obj->FK_DocumentoPropietario = "";
    echo "<script> alert('Consulte si el propietario existe para registrar la mascota')</script>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de nueva mascota</title>
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
                        <a href="<?php echo "agregar_propietario.php?DocM=".urldecode($DocM)?>"> 
                            <i class="zmdi zmdi-folder"></i> Registros
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../historia_clinica/historia_clinica-buscar.php?DocM=".urldecode($DocM)?>">
                            <i class="zmdi zmdi-folder"></i> Historia clinica
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=".urldecode($DocM)?>">
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
                <h1 class="text-titles">Registro</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "agregar_propietario.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; REGISTRO PROPIETARIO Y MASCOTA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "agregar_nueva_mascota.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR NUEVA MASCOTA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "Listar_Propietario.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR PROPIETARIO
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "Listar_Mascota.php?DocM=".urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR MASCOTA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Formulario -->

        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA MASCOTA</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST">                       
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group label-floating">
                                        <span class="control-label">Ingrese el DNI del propetario</span>
                                        <input class="form-control" type="number" name="Documento_Propietario" id="Documento_Propietario" value="<?php echo $obj->FK_DocumentoPropietario?>" required/>
                                        <button name="consulta" type="submit" class="btn btn-info btn-raised btn-m">CONSULTAR</button>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </form>
                    <form action="" method="POST">
                        <fieldset>
                            <legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos de la nueva mascota</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre de la mascota</label>
                                            <input class="form-control" type="text" name="Nombre_Mascota" id="Nombre_Mascota" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Especie</label>
                                            <select class="form-control" name="FK_EspecieMascota" id="FK_EspecieMascota">
                                            <?php
                                                $clas = new Conexion();
                                                $conecta = $clas->conectarServidor();
                                                $query = "SELECT * FROM especie";
                                                $resultado = mysqli_query($conecta, $query);
                                                $especie = mysqli_fetch_row($resultado);
                                                do {
                                            ?>
                                                <option value="<?php echo $especie[0];?>"><?php echo $especie[1];?></option>      
                                            <?php
                                                } while ($especie = mysqli_fetch_row($resultado));
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Color</label>
                                            <input class="form-control" type="text" name="Color_Mascota" id="Color_Mascota" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Genero</label>
                                            <select class="form-control" name="FK_GeneroMascota" id="FK_GeneroMascota">
                                                <?php
                                                    $clas = new Conexion();
                                                    $conecta = $clas->conectarServidor();
                                                    $query = "SELECT * FROM genero";
                                                    $resultado = mysqli_query($conecta, $query);
                                                    $genero = mysqli_fetch_row($resultado);
                                                    do {
                                                ?>  
                                                    <option value="<?php echo $genero[0];?>"><?php echo $genero[1];?></option>    
                                                <?php
                                                    } while ($genero = mysqli_fetch_row($resultado));
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Edad</label>
                                            <input class="form-control" type="number" name="Edad_Mascota" maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">>Observaciones</label>
                                            <input class="form-control" type="text" name="Observacion_Mascota" id="Observacion_Mascota"  size="40">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                            <input type="hidden" name="Documento_Propietario" id="Documento_Propietario" value="<?php echo $obj->FK_DocumentoPropietario?>" readOnly/>                    
                            <input type="hidden" name="Documento_Medico" id="Documento_Medico" value="<?php echo $DocM;?>" readOnly size="30">
                            <p class="text-center" style="margin-top: 20px;">
                            <button name="agregar" type="submit" class="btn btn-info btn-raised btn-m">CREAR</button>
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