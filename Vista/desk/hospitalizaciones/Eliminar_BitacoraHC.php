<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_HospitalizacionBitacora.php";
    include "../../../Modelo/modelo_Bitacora.php";
?>

<?php
    $llave = $_GET['key'];
    $DocM = $_GET['DocM'];
    echo $llave;
    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];
?>

<?php

    $obj=new Hospitalizacion_Bitacora;
    $obj=new Bitacora;

        $CodH = $_GET['CodH'];
        $CodB = $_GET ['CodB'];


        $clas = new Conexion();
        $conecta = $clas->conectarServidor();

    if(isset($_POST['eliminarBit'])){
        $obj->Codigo_Bitacora = $_POST['Codigo_Bitacora'];
        $obj->FechaActual_Bitacora = $_POST['FechaActual_Bitacora'];
        $obj->FormMedTratada_Bitacora = $_POST['FormMedTratada_Bitacora'];
        $obj->Temperatura_Bitacora = $_POST['Temperatura_Bitacora'];
        $obj->FrecCardiaca_Bitacora = $_POST['FrecCardiaca_Bitacora'];
        $obj->FrecRespiratoria_Bitacora = $_POST['FrecRespiratoria_Bitacora'];
        $obj->ColorMucosa_Bitacora = $_POST['ColorMucosa_Bitacora'];
        $obj->Apetito_Bitacora = $_POST['Apetito_Bitacora'];
        $obj->Sed_Bitacora = $_POST['Sed_Bitacora'];
        $obj->EstadoAnimo_Bitacora = $_POST['EstadoAnimo_Bitacora'];
        $obj->Vomito_Bitacora = $_POST['Vomito_Bitacora'];
        $obj->Orina_Bitacora = $_POST['Orina_Bitacora'];
        $obj->GradoHidratacion_Bitacora = $_POST['GradoHidratacion_Bitacora'];
        $obj->Observacion_Bitacora = $_POST['Observacion_Bitacora'];

        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];
        $obj->FK_CodigoBitacora = $_POST['FK_CodigoBitacora'];

        $obj->Codigo_Bitacora = "";
        $obj->FechaActual_Bitacora = "";
        $obj->FormMedTratada_Bitacora = "";
        $obj->Temperatura_Bitacora = "";
        $obj->FrecCardiaca_Bitacora = "";
        $obj->FrecRespiratoria_Bitacora = "";
        $obj->ColorMucosa_Bitacora = "";
        $obj->Apetito_Bitacora = "";
        $obj->Sed_Bitacora = "";
        $obj->EstadoAnimo_Bitacora = "";
        $obj->Vomito_Bitacora = "";
        $obj->Orina_Bitacora = "";
        $obj->GradoHidratacion_Bitacora = "";
        $obj->Observacion_Bitacora = "";
    }
    else{

        $query = "SELECT * FROM bitacora b INNER JOIN hospitalizacion_bitacora hb WHERE b.Codigo_Bitacora = '$CodB' AND hb.FK_CodigoHospitalizacion='$CodH'";
        $resultado = mysqli_query($conecta,$query);
        $arreglo = mysqli_fetch_row($resultado);

        $obj->Codigo_Bitacora = $arreglo[0];
        $obj->FechaActual_Bitacora = $arreglo[1];
        $obj->FormMedTratada_Bitacora = $arreglo[2];
        $obj->Temperatura_Bitacora = $arreglo[3];
        $obj->FrecCardiaca_Bitacora = $arreglo[4];
        $obj->FrecRespiratoria_Bitacora = $arreglo[5];
        $obj->ColorMucosa_Bitacora = $arreglo[6];
        $obj->Apetito_Bitacora = $arreglo[7];
        $obj->Sed_Bitacora = $arreglo[8];
        $obj->EstadoAnimo_Bitacora = $arreglo[9];
        $obj->Vomito_Bitacora = $arreglo[10];
        $obj->Orina_Bitacora = $arreglo[11];
        $obj->GradoHidratacion_Bitacora = $arreglo[12];
        $obj->Observacion_Bitacora = $arreglo[13];
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
                            <a href="Modificar_HospitalizacionHC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>&CodH=<?php echo urlencode($CodH)?>" title="Historias Clinicas">
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
                    <a href="search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

    <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Bitacora de <?php echo $arregloHC[2] ?> </h1>
            </div>
        </div>

        <div class="container-fluid">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-delete"></i> &nbsp; ELIMINAR BITACORA</h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Bitacora No.</label>
                                            <input class="form-control" type="text" name="Codigo_Bitacora" id="Codigo_Bitacora" value="<?php echo $obj->Codigo_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <input class="form-control" type="date" name="FechaActual_Bitacora" id="FechaActual_Bitacora" value="<?php echo $obj->FechaActual_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Formula Medica</label>
                                            <input class="form-control" type="text" name="FormMedTratada_Bitacora" id="FormMedTratada_Bitacora" value="<?php echo $obj->FormMedTratada_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Temperatura</label>
                                            <input class="form-control" type="text" name="Temperatura_Bitacora" id="Temperatura_Bitacora" value="<?php echo $obj->Temperatura_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Cardiaca</label>
                                            <input class="form-control" type="text" name="FrecCardiaca_Bitacora" id="FrecCardiaca_Bitacora" value="<?php echo $obj->FrecCardiaca_Bitacora ?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Respiratoria</label>
                                            <input class="form-control" type="text" name="FrecRespiratoria_Bitacora" id="FrecRespiratoria_Bitacora" value="<?php echo $obj->FrecRespiratoria_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Color Mucosa</label>
                                            <input class="form-control" type="text" name="ColorMucosa_Bitacora" id="ColorMucosa_Bitacora" value="<?php echo $obj->ColorMucosa_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Apetito</label>
                                            <input class="form-control" type="text" name="Apetito_Bitacora" id="Apetito_Bitacora" value="<?php echo $obj->Apetito_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sed</label>
                                            <input class="form-control" type="text" name="Sed_Bitacora" id="Sed_Bitacora" value="<?php echo $obj->Sed_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Estado Animo</label>
                                            <input class="form-control" type="text" name="EstadoAnimo_Bitacora" id="EstadoAnimo_Bitacora" value="<?php echo $obj->EstadoAnimo_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Vomito </label>
                                            <input class="form-control" type="text" name="Vomito_Bitacora" id="Vomito_Bitacora" value="<?php echo $obj->Vomito_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Orina</label>
                                            <input class="form-control" type="text" name="Orina_Bitacora" id="Orina_Bitacora" value="<?php echo $obj->Orina_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Grado Hidratacion</label>
                                            <input class="form-control" type="text" name="GradoHidratacion_Bitacora" id="GradoHidratacion_Bitacora" value="<?php echo $obj->GradoHidratacion_Bitacora?>" readOnly size="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion</label>
                                            <textarea class="form-control" type="text" name="Observacion_Bitacora" id="Observacion_Bitacora" size="40" rows="7" readOnly><?php echo $obj->Observacion_Bitacora?></textarea>
                                        </div>
                                    </div>
                                            <input type="hidden" name="FK_CodigoHospitalizacion" id="FK_CodigoHospitalizacion" value="<?php echo $CodH;?>" readOnly size="30">
                                            <input type="hidden" name="FK_CodigoBitacora" id="FK_CodigoBitacora" value="<?php echo $obj->Codigo_Bitacora;?>" readOnly size="30">                             
                                        <td><button class="btn btn-danger btn-raised btn-sm" name="eliminarBit" type="submit">ELIMINAR BITACORA</button></td>
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