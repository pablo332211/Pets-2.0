<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_HistoriaClinicaHospitalizacion.php";
    include "../../../Modelo/modelo_HospitalizacionBitacora.php";
    include "../../../Modelo/modelo_Hospitalizacion.php";
?>

<?php
$DocM =$_GET['DocM'];
$CodH = $_GET['CodH'];
$llave = $_GET['key'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

   
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT b.Codigo_Bitacora,b.FechaActual_Bitacora FROM bitacora b INNER JOIN hospitalizacion_bitacora hb WHERE hb.FK_CodigoHospitalizacion = '$CodH' AND b.Codigo_Bitacora = hb.FK_CodigoBitacora";
    echo $query;
    $resultado = mysqli_query($conecta,$query);
    $arreglo = mysqli_fetch_row($resultado);

    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];

        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];

        $obj->Codigo_Hospitalizacion = $_POST['Codigo_Hospitalizacion'];
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
                            <a href="../cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
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
                                <a href="../citas_medicas/CitaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
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
                            <li>
                                <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Certificaciones
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
                    <h1 class="text-titles">Formula Medica</h1>
                </div>
            </div>
             <!-- panel lista de historias -->
        <div class="container-fluid">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA MEDICAMENTOS</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form action="" method="post">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">CODIGO</th>
                                        <th class="text-center">FECHA INGRESO</th>                                     
                                    </tr>
                                </thead>
                                <?php
                                if($arreglo>0){
                                    do{
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $arreglo[0]; ?></td>
                                        <td><?php echo $arreglo[1]; ?></td>
                                        <input type="hidden" name="FK_CodigoHospitalizacion" id="FK_CodigoHospitalizacion" value="<?php echo $CodH; ?>" readOnly size="30">

                                        <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $llave; ?>" readOnly size="30">
                                        <input type="hidden" name="FK_CodigoHospitalizacion" id="FK_CodigoHospitalizacion" value="<?php echo $CodH;?>" readOnly size="30">

                                        <input type="hidden" name="Codigo_Hospitalizacion" id="Codigo_Hospitalizacion" value="<?php echo $CodH;?>" readOnly size="30">
                                    </tr>
                                <?php          
                                    }while($arreglo = mysqli_fetch_row($resultado));
                                }else{
                                    echo "No existen Registros";
                                }
                                ?>
                                </tbody>
                            </table>
                            <button type="submit" name="eliminar" class="btn btn-danger btn-raised btn-xl">eliminar</button>
                                
                        </form>
                    </div>
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