<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_FormulaMedicaMedicamento.php";

?>

<?php
$CodHC = $_GET['CodHC'];
$DocM = $_GET['DocM'];


$clas = new Conexion;
$conecta = $clas->conectarServidor();
$query = "SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$CodHC' AND FK_CodigoMascota=Codigo_Mascota";
$resultado = mysqli_query($conecta, $query);
$arregloHC = mysqli_fetch_row($resultado);
$obj->Codigo_HistoriaClinica = $arregloHC[0];
$obj->FK_CodigoMascota = $arregloHC[1];
$obj->Nombre_Mascota = $arregloHC[2];
?>

<?php

$obj = new FormulaMedica_Medicamento;

if ($_POST) {
    $obj->FK_CodigoFormulaMedica = $_POST['FK_CodigoFormulaMedica'];
    $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
    $obj->Dosis_Medicamento = $_POST['Dosis_Medicamento'];
    $obj->FK_CodigoAdministracion = $_POST['FK_CodigoAdministracion'];
    $obj->Observacion_Medicamento = $_POST['Observacion_Medicamento'];
}

$CodM = $_GET['CodM'];
$CodFM = $_GET['CodFM'];
$clas = new Conexion();
$conecta = $clas->conectarServidor();

$query = "SELECT * FROM medicamento WHERE Codigo_Medicamento = '$CodM'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->Codigo_Medicamento = $arreglo[0];
$obj->Nombre_Medicamento = $arreglo[1];
$obj->Tipo_Medicamento = $arreglo[2];
$obj->FK_CodigoPresentacion = $arreglo[3];
$obj->Concentracion_Medicamento = $arreglo[4];

$query = "SELECT * FROM formulamedica_medicamento WHERE FK_CodigoMedicamento = '$CodM' AND FK_CodigoFormulaMedica ='$CodFM'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
$obj->FK_CodigoFormulaMedica = $arreglo[0];
$obj->FK_CodigoMedicamento = $arreglo[1];
$obj->Dosis_Medicamento = $arreglo[2];
$obj->FK_CodigoAdministracion = $arreglo[3];
$obj->Observacion_Medicamento = $arreglo[4];
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>desk_full</title>
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
                        <a href="../desk/cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM) ?>" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="Listar_Medicamento.php?CodHC=<?php echo urldecode($arregloHC[0]) ?>&CodFM=<?php echo urldecode($CodFM) ?>&DocM=<?php echo urldecode($DocM) ?>" title="Historia Clinica">
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
                            <a href="../citas_medicas/ListarCitaMedica_HC.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Cita medica
                            </a>
                        </li>
                        <li>
                            <a href="../formula_medica/FormulaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Formula medica
                            </a>
                        </li>
                        <li>
                            <a href="../examenes/Examenes_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Exámenes
                            </a>
                        </li>
                        <li>
                            <a href="../agendar_cita/AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Agendar cita
                            </a>
                        </li>
                        <li>
                            <a href="../hospitalizaciones/Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Hospitalizaciones
                            </a>
                        </li>
                        <li>
                            <a href="../vacunacion_desparacitacion/VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                            </a>
                        </li>
                        <li>
                            <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Cirugía
                            </a>
                        </li>
                        <li>
                            <a href="../remisiones/Remisiones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
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
                <h1 class="text-titles">Modificar Medicamento</h1>
            </div>


               

                <form action="" method="POST">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; Formula Medica</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">COD</th>
                                            <th class="text-center">NOMBRE MEDICAMENTO</th>
                                            <th class="text-center">TIPO</th>
                                            <th class="text-center">PRESENTACION</th>
                                            <th class="text-center">CONCENTRACION</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="text-center"> <input class="form-control" type="text" name="Codigo_Medicamento" id="Codigo_Medicamento" value="<?php echo $obj->Codigo_Medicamento ?>" readOnly size="40"> </td>
                                            <td class="text-center"> <input class="form-control" type="text" name="Nombre_Medicamento" id="Nombre_Medicamento" value="<?php echo $obj->Nombre_Medicamento ?>" readOnly size="40"> </td>
                                            <td class="text-center"> <input class="form-control" type="text" name="Tipo_Medicamento" id="Tipo_Medicamento" value="<?php echo $obj->Tipo_Medicamento ?>" readOnly size="40"></td>
                                            <?php
                                                $clas = new Conexion();
                                                $conecta = $clas->conectarServidor();
                                                $query = "SELECT * FROM presentacion WHERE Codigo_Presentacion = '$obj->FK_CodigoPresentacion'";
                                                $resultado = mysqli_query($conecta, $query);
                                                $presentacion = mysqli_fetch_row($resultado);
                                                do {
                                            ?>  
                                                <td class="text-center"><input class="form-control" type="text" value="<?php echo $presentacion[1]; ?>" readOnly size="40"></td>
                                            <?php
                                                } while ($presentacion = mysqli_fetch_row($resultado));
                                            ?>
                                            <td class="text-center"> <input class="form-control" type="text" name="Concentracion_Medicamento" id="Concentracion_Medicamento" value="<?php echo $obj->Concentracion_Medicamento ?>" readOnly size="40"></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </form>
                <hr size="2px" color="black" />
                <div class="container-fluid">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-edit"></i> &nbsp; Modificar Medicamento </h3>
                        </div>
                        <form method="POST">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <tr>
                                            <div class="col-xs-6 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Dosis Medicamento</label>
                                                    <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,45}" required name="Dosis_Medicamento" id="Dosis_Medicamento" value="<?php echo $obj->Dosis_Medicamento ?>" size="40">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <?php
                                                        $clas = new Conexion();
                                                        $conecta = $clas->conectarServidor();
                                                        $query = "SELECT * FROM administracion WHERE Codigo_Administracion='$obj->FK_CodigoAdministracion'";
                                                        $resultado = mysqli_query($conecta, $query);
                                                        $administracion = mysqli_fetch_row($resultado);
                                                        do {
                                                    ?>  
                                                        <input type="hidden" name="FK_CodigoAdministracion" id="FK_CodigoAdministracion" readOnly value="<?php echo $administracion[0];?>" maxlength="40">
                                                        <input class="form-control" type="text" readOnly value="<?php echo $administracion[1];?>" maxlength="15">   
                                                    <?php
                                                        } while ($administracion = mysqli_fetch_row($resultado));
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Observacion Medicamento </label>
                                                    <textarea class="form-control" type="text-area" maxlength="400" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" required name="Observacion_Medicamento" id="Observacion_Medicamento" rows="7" cols="60" required><?php echo $obj->Observacion_Medicamento ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="FK_CodigoFormulaMedica" id="FK_CodigoFormulaMedica" value="<?php echo $obj->FK_CodigoFormulaMedica; ?>" readOnly size="30">
                                            <input type="hidden" name="FK_CodigoMedicamento" id="FK_CodigoMedicamento" value="<?php echo $obj->FK_CodigoMedicamento; ?>" readOnly size="30">
                                            <td><button class="btn btn-info btn-raised btn-sm" name="modificar" type="submit">Modificar Medicamento</button></td>
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