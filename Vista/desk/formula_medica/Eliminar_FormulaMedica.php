<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_FormulaMedicaMedicamento.php";
include "../../../Modelo/modelo_HistoriaClinicaFormulaMedica.php";
include "../../../Modelo/modelo_FormulaMedica.php";
?>

<?php
$CodFM = $_GET['CodFM'];
$CodHC = $_GET['CodHC'];
$DocM = $_GET['DocM'];

if(isset($_POST['eliminar'])){
    $obj = new Formula_Medica();
    $obj = new HistoriaClinica_FormulaMedica();
    $obj = new formulamedica_medicamento();

    $obj->Codigo_FormulaMedica = $_POST['Codigo_FormulaMedica'];

    $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"] ;
    $obj->FK_CodigoFormulaMedica = $_POST["FK_CodigoFormulaMedica"] ;

    $obj->FK_CodigoFormulaMedica = $_POST['FK_CodigoFormulaMedica'];
}

$clas = new Conexion;
$conecta = $clas->conectarServidor();
$query = "SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$CodHC' AND FK_CodigoMascota=Codigo_Mascota";
$resultado = mysqli_query($conecta, $query);
$arregloHC = mysqli_fetch_row($resultado);
$obj->Codigo_HistoriaClinica = $arregloHC[0];
$obj->FK_CodigoMascota = $arregloHC[1];
$obj->Nombre_Mascota = $arregloHC[2];


$clas = new Conexion();
$conecta = $clas->conectarServidor();
$query = "SELECT m.Codigo_Medicamento,m.Nombre_Medicamento, m.FK_CodigoPresentacion ,fm.Dosis_Medicamento,fm.FK_CodigoAdministracion ,fm.Observacion_Medicamento FROM medicamento m INNER JOIN formulamedica_medicamento fm WHERE fm.FK_CodigoFormulaMedica = '$CodFM' AND fm.FK_CodigoMedicamento = m.Codigo_Medicamento";
echo $query;
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
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
                        <a href="./FormulaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" title="Historia Clinica">
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
                <h1 class="text-titles">Formula Medica de <?php echo $arregloHC[2]; ?></h1>
            </div>
        </div>
        <!-- panel lista de historias -->
        <div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-delete"></i> &nbsp; ELIMINAR MEDICAMENTO</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <form action="" method="post">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">CODIGO</th>
                                        <th class="text-center">NOMBRE MEDICAMENTO</th>
                                        <th class="text-center">PRESENTACION</th>
                                        <th class="text-center">DOSIS</th>
                                        <th class="text-center">ADMINISTRACION</th>
                                        <th class="text-center">OBSERVACION</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($arreglo > 0) {
                                    do {
                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $arreglo[0]; ?></td>
                                                <td><?php echo $arreglo[1]; ?></td>
                                                <td><?php echo $arreglo[2]; ?></td>
                                                <td><?php echo $arreglo[3]; ?></td>
                                                <td><?php echo $arreglo[4]; ?></td>
                                                <td><?php echo $arreglo[5]; ?></td>
                                            </tr>
                                        </tbody>
                                <?php
                                    } while ($arreglo = mysqli_fetch_row($resultado));
                                } else {
                                    echo "No existen Registros";
                                }
                                ?>
                            </table>
                            <input type="hidden" name="FK_CodigoFormulaMedica" id="FK_CodigoFormulaMedica" value="<?php echo $CodFM; ?>" readOnly size="30">

                            <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $CodHC; ?>" readOnly size="30">
                            <input type="hidden" name="FK_CodigoFormulaMedica" id="FK_CodigoFormulaMedica" value="<?php echo $CodFM; ?>" readOnly size="30">

                            <input type="hidden" name="Codigo_FormulaMedica" id="Codigo_FormulaMedica" value="<?php echo $CodFM; ?>" readOnly size="30">
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-danger btn-raised btn-sm" id="eliminar" name="eliminar"><i class="zmdi zmdi-"></i>ELIMINAR</button>
                        </p>
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