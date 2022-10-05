<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_HistoriaClinicaExamen.php";
    include "../../../Modelo/modelo_examen.php";
    
?>
<?php
$CodHC = $_GET['CodHC'];
$DocM = $_GET['DocM'];


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

    $obj = new HistoriaClinica_Examen;
    $obj=  new examen;

    if($_POST){
        $obj->Codigo_Examen = $_POST['Codigo_Examen'];
        $obj->Fecha_Examen = $_POST['Fecha_Examen'];
        $obj->Tipo_Examen = $_POST['Tipo_Examen'];
        $obj->Correo_Examen = $_POST['Correo_Examen'];
        $obj->Resultado_Examen = $_POST['Resultado_Examen'];
        $obj->Observacion_Examen = $_POST['Observacion_Examen'];

        $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
        $obj->FK_CodigoExamen = $_POST['FK_CodigoExamen'];
    }
        $CodE = $_GET['CodE'];
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();

    if(isset($_POST['eliminar'])){
        $obj->Codigo_Examen = "";
        $obj->Fecha_Examen = "";
        $obj->Tipo_Examen = "";
        $obj->Correo_Examen = "";
        $obj->Resultado_Examen = "";
        $obj->Observacion_Examen = "";

    }
    else{
        $query = "SELECT * FROM examen WHERE Codigo_Examen = '$CodE'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);
        $obj->Codigo_Examen = $arreglo[0];
        $obj->Fecha_Examen = $arreglo[1];
        $obj->Tipo_Examen = $arreglo[2];
        $obj->Correo_Examen = $arreglo[3];
        $obj->Resultado_Examen = $arreglo[4];  
        $obj->Observacion_Examen = $arreglo[5]; 
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
                            <a href="Listar_ExamenHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historia Clinica">
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
                    <a href="../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        
        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                    <h1 class="text-titles">Eliminar examen de <?php echo $arregloHC[2]; ?></h1>
        </div>

        
            <div class="container-fluid">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-delete"></i> &nbsp; </h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Codigo Examen</label>
                                                <input class="form-control" type="text" name="Codigo_Examen" id="Codigo_Examen" value="<?php echo$obj->Codigo_Examen?>" readOnly size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Fecha Examen</label>
                                                <input class="form-control" type="date" name="Fecha_Examen" id="Fecha_Examen" value="<?php echo$obj->Fecha_Examen?>"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo Examen</label>
                                                <input class="form-control" type="text" name="Tipo_Examen" id="Tipo_Examen" value="<?php echo $obj->Tipo_Examen?>"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Correo Examen </label>
                                                <input class="form-control" type="text" name="Correo_Examen" id="Correo_Examen" value="<?php echo $obj->Correo_Examen?>"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Resultado Examen  </label>
                                                <input class="form-control" type="text" name="Resultado_Examen" id="Resultado_Examen" value="<?php echo $obj->Resultado_Examen?>"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Observacion Examen  </label>
                                                <textarea class="form-control" type="text" name="Observacion_Examen" id="Observacion_Examen" size="40" rows="7"> <?php echo $obj->Observacion_Examen?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $CodHC?>" readOnly size="30">
                                        <input type="hidden" name="FK_CodigoExamen" id="FK_CodigoExamen" value="<?php echo $obj->Codigo_Examen;?>" readOnly size="30">
                                        <td><button class="btn btn-danger btn-raised btn-sm" name="eliminar" type="submit">Eliminar Examen</button></td>
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