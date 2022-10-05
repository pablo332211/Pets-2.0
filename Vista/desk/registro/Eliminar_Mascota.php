<?php 
    include "../../../Conexion/conexion.php"; 
    include "../../../Modelo/modelo_Mascota.php";
?>
<?php
$DocM=$_GET['DocM'];

$obj = new Mascota();
if($_POST){
    $obj->Codigo_Mascota = $_POST['Codigo_Mascota'];
    $obj->Nombre_Mascota = $_POST['Nombre_Mascota'];
    $obj->FK_EspecieMascota = $_POST['FK_EspecieMascota'];
    $obj->Color_Mascota = $_POST['Color_Mascota'];
    $obj->Edad_Mascota = $_POST['Edad_Mascota'];
    $obj->FK_GeneroMascota = $_POST['FK_GeneroMascota'];
    $obj->Observacion_Mascota = $_POST['Observacion_Mascota'];
}
?>
<?php
$llave = $_GET['key'];
echo $llave;
if(isset($_POST['eliminar'])){
    $obj->Codigo_Mascota = "";
    $obj->Nombre_Mascota = "";
    $obj->Edad_Mascota = "";
    $obj->Especie_Mascota = "";
    $obj->Raza_Mascota = "";
    $obj->Genero_Mascota = "";
    $obj->Color_Mascota = "";
    $obj->Observacion_Mascota ="";

}
else{

    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM mascota WHERE Codigo_Mascota = '$llave'";
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);
    $obj->Codigo_Mascota = $arreglo[0];
    $obj->Nombre_Mascota = $arreglo[2];
    $obj->Especie_Mascota = $arreglo[3];
    $obj->Color_Mascota = $arreglo[4];
    $obj->Edad_Mascota = $arreglo[5];
    $obj->Genero_Mascota = $arreglo[6];
    $obj->Observacion_Mascota = $arreglo[7];
    }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registro</title>
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
                <h1 class="text-titles">DATOS MASCOTA</h1>
                
            </div>
        </div>


<!-- Formulario -->
<div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-delete"></i>&nbsp;DATOS DE LA MASCOTA</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" id="">
                        <fieldset>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo Mascota</label>
                                            <input class="form-control" type="text" name="Codigo_Mascota" id="Codigo_Mascota" value="<?php echo $obj->Codigo_Mascota ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input class="form-control" type="text" name="Nombre_Mascota" id="Nombre_Mascota" value="<?php echo $obj->Nombre_Mascota ?>" readOnly  maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Especie</label>
                                            <?php
                                            $clas = new Conexion();
                                            $conecta = $clas->conectarServidor();
                                            $query = "SELECT * FROM especie WHERE Codigo_Especie='$obj->Especie_Mascota'";
                                            $resultado = mysqli_query($conecta, $query);
                                            $especie = mysqli_fetch_row($resultado);
                                            if($especie > 1){
                                                do {
                                            ?>
                                                    <input type="hidden" name="FK_EspecieMascota" id="FK_EspecieMascota" readOnly value="<?php echo $especie[0];?>" maxlength="40">
                                                    <input class="form-control" type="text"readOnly value="<?php echo $especie[1];?>" maxlength="40">   
                                            <?php
                                                    } while ($especie = mysqli_fetch_row($resultado));
                                            }
                                            else{
                                            ?>
                                                    <input class="form-control" type="text" readOnly value="" maxlength="15">   
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Color</label>
                                            <input class="form-control" type="text" name="Color_Mascota" id="Color_Mascota" value="<?php echo $obj->Color_Mascota ?>"  readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Edad</label>
                                            <input class="form-control" type="text" name="Edad_Mascota" id="Edad_Mascota" value="<?php echo $obj->Edad_Mascota ?>" readOnly maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Genero</label>
                                            <?php
                                                $clas = new Conexion();
                                                $conecta = $clas->conectarServidor();
                                                $query = "SELECT * FROM genero WHERE Codigo_Genero='$obj->Genero_Mascota'";
                                                $resultado = mysqli_query($conecta, $query);
                                                $genero = mysqli_fetch_row($resultado);
                                                if($genero > 1){
                                                    do {
                                            ?>  
                                                    <input type="hidden" name="FK_GeneroMascota" id="FK_GeneroMascota" readOnly value="<?php echo $genero[0];?>" maxlength="40">
                                                    <input class="form-control" type="text" readOnly value="<?php echo $genero[1];?>" maxlength="15">   
                                            <?php
                                                    } while ($genero = mysqli_fetch_row($resultado));
                                                }
                                                else{
                                            ?>
                                                    
                                                    <input class="form-control" type="text" readOnly value="" maxlength="15">   
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion</label>
                                            <input class="form-control" type="text" name="Observacion_Mascota" id="Observacion_Mascota" value="<?php echo $obj->Observacion_Mascota ?>" readOnly maxlength="15">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <p class="text-center" style="margin-top: 20px;">
                        <button class="btn btn-danger btn-raised btn-sm" name="eliminar" type="submit">ELIMINAR</button>
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