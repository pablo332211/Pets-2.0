<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_PruebaLaboratorio.php";
?>

<?php
$CodHC = $_GET['CodHC'];
$DocM = $_GET['DocM'];
echo $CodHC;

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$CodHC' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

?>

<?php
    $obj = new Prueba_Laboratorio();

    if($_POST){
        $obj->Codigo_PruebaLaboratorio = $_POST['Codigo_PruebaLaboratorio'];
        $obj->Nombre_PruebaLaboratorio = $_POST['Nombre_PruebaLaboratorio'];
        $obj->Tipo_PruebaLaboratorio = $_POST['Tipo_PruebaLaboratorio'];
        $obj->Fecha_PruebaLaboratorio = $_POST['Fecha_PruebaLaboratorio'];
        $obj->Laboratorio_PruebaLaboratorio = $_POST['Laboratorio_PruebaLaboratorio'];
        $obj->Resultado_PruebaLaboratorio = $_POST['Resultado_PruebaLaboratorio'];
    }
        $CodPL = $_GET['CodPL'];

        $clas = new Conexion();
        $conecta = $clas->conectarServidor();

        $query = "SELECT * FROM prueba_laboratorio WHERE Codigo_PruebaLaboratorio = '$CodPL'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->Codigo_PruebaLaboratorio = $arreglo[0];
        $obj->Nombre_PruebaLaboratorio = $arreglo[1];
        $obj->Tipo_PruebaLaboratorio = $arreglo[2];
        $obj->Fecha_PruebaLaboratorio = $arreglo[3];
        $obj->Laboratorio_PruebaLaboratorio = $arreglo[4];  
        $obj->Resultado_PruebaLaboratorio = $arreglo[5];    
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
                            <a href="Listar_PruebaLaboratorioHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historia Clinica">
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
                <h1 class="text-titles"> Prueba Laboratorio de <?php echo $arregloHC[2] ?></h1>
            </div>
        </div>

        <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-edit"></i> &nbsp; Modificar Prueba Laboratorio</h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Codigo Pueba Laboratorio </label>
                                                <input class="form-control" type="text" name="Codigo_PruebaLaboratorio" id="Codigo_PruebaLaboratorio" value="<?php echo  $obj->Codigo_PruebaLaboratorio?>" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre de la Prueba de Laboratorio </label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  class="form-control" type="text" name="Nombre_PruebaLaboratorio" id="Nombre_PruebaLaboratorio" value="<?php echo $obj->Nombre_PruebaLaboratorio?>" size="40"  maxlength="45">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de Prueba Laboratorio </label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  class="form-control" type="text" name="Tipo_PruebaLaboratorio" id="Tipo_PruebaLaboratorio" value="<?php echo $obj->Tipo_PruebaLaboratorio?>" size="40" maxlength="45">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <input class="form-control" type="date" name="Fecha_PruebaLaboratorio" id="Fecha_PruebaLaboratorio" value="<?php echo $obj->Fecha_PruebaLaboratorio?>" size="40" >
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Laboratorio realizado </label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" class="form-control" type="text" name="Laboratorio_PruebaLaboratorio" id="Laboratorio_PruebaLaboratorio" value="<?php echo $obj->Laboratorio_PruebaLaboratorio?>" size="40"  maxlength="100">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Resultado del Examen  </label>
                                                <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}"  class="form-control" type="text" name="Resultado_PruebaLaboratorio" id="Resultado_PruebaLaboratorio"size="40" rows="7"  maxlength="500" cols="60"><?php echo $obj->Resultado_PruebaLaboratorio?></textarea>
                                            </div>
                                        </div>
                                            <td><button class="btn btn-info btn-raised btn-sm" name="modificar" type="submit">MODIFICAR PRUEBA</button></td>                                    
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