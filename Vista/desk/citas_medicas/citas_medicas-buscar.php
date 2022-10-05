<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_CitaMedica.php";
?>

<?php
    $clas = new conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM cita_Medica";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
?>

<?php
    $obj = new cita_medica();

    //datos tomados en la historia clinica
    if ($_POST) {
        //Llave foranea Medico
        $obj->FK_DocumentoMedico =$_POST['FK_DocumentoMedico'];
        //Atributos CITA MEDICA
        $obj->Codigo_CitaMedica = $_POST['Codigo_CitaMedica'];
        $obj->TipoCita_CitaMedica=$_POST['TipoCita_CitaMedica'];
        $obj->Oidos_CitaMedica=$_POST['Oidos_CitaMedica'];
        $obj->FrecCardiaca_CitaMedica=$_POST['FrecCardiaca_CitaMedica'];
        $obj->Ojos_CitaMedica=$_POST['Ojos_CitaMedica'];
        $obj->Auscultacion_CitaMedica=$_POST['Auscultacion_CitaMedica'];
        $obj->FrecRespiratoria_CitaMedica=$_POST['FrecRespiratoria_CitaMedica'];
        $obj->Mucosas_CitaMedica=$_POST['Mucosas_CitaMedica'];
        $obj->Peso_CitaMedica=$_POST['Peso_CitaMedica'];
        $obj->Tilc_CitaMedica=$_POST['Tilc_CitaMedica'];
        $obj->Ganglios_CitaMedica=$_POST['Ganglios_CitaMedica'];
        $obj->Palpitacion_CitaMedica=$_POST['Palpitacion_CitaMedica'];
        $obj->CavidadOral_CitaMedica=$_POST['CavidadOral_CitaMedica'];
        $obj->Nervioso_CitaMedica=$_POST['Nervioso_CitaMedica'];
        $obj->Temperatura_CitaMedica=$_POST['Temperatura_CitaMedica'];
        $obj->Tegumento_CitaMedica=$_POST['Tegumento_CitaMedica'];
        $obj->Observacion_CitaMedica=$_POST['Observacion_CitaMedica'];
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cita medica full</title>
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

        <!-- botones de crear y bucar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Citas medicas</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="citas_medicas.php" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; CREAR CITA MEDICA
                        </a>
                    </li>
                    <li>
                        <a href="citas_medicas-buscar.php" class="btn btn-success">
                            <i class="zmdi zmdi-search">
                            </i> &nbsp; BUSCAR CITA MEDICA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Panel listado de busqueda de propietarios -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar pacientes con formulas
                        medicas</h3>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <div class="form-group label-floating">
                            <span class="control-label">Ingrese el DNI del propetario</span>
                            <input class="form-control" type="number" name="" required="" />
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <p class="text-center">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">
                                <i class="zmdi zmdi-search"></i> &nbsp; Buscar
                            </button>
                        </p>
                    </div>
                </div>
                <form action="" name="propietario" id="propietario" method="POST">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr">
                                        <td class="text-center">Cod cita</td>
                                        <td class="text-center">DNI Medico</td>
                                        <td class="text-center">Tipo de cita</td>
                                        <td class="text-center">Oidos</td>
                                        <td class="text-center">Frecuencia Cardia</td>
                                        <td class="text-center">Auscultacion</td>
                                        <td class="text-center">Frecuencia Respiratoria</td>
                                        <td class="text-center">Ojos</td>
                                        <td class="text-center">Mucosas</td>
                                        <td class="text-center">Peso</td>
                                        <td class="text-center">Tilc</td>
                                        <td class="text-center">Ganglios</td>
                                        <td class="text-center">Palpitacion</td>
                                        <td class="text-center">Cavidad Oral</td>
                                        <td class="text-center">Nervioso</td>
                                        <td class="text-center">Temperatura</td>
                                        <td class="text-center">Tegumento</td>
                                        <td class="text-center">Observacion</td>
                                        <td class="text-center">Modificar</td>
                                        <td class="text-center">Eliminar</td>
                                        </tr>
                                </thead>
                                <?php
                                do {
                                ?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $arreglo[0] ?>.</th>
                                        <th><?php echo $arreglo[1] ?>.</th>
                                        <th><?php echo $arreglo[2] ?>.</th>
                                        <th><?php echo $arreglo[3] ?>.</th>
                                        <th><?php echo $arreglo[4] ?>.</th>
                                        <th><?php echo $arreglo[5] ?>.</th>
                                        <th><?php echo $arreglo[6] ?>.</th>
                                        <th><?php echo $arreglo[7] ?>.</th>
                                        <th><?php echo $arreglo[8] ?>.</th>
                                        <th><?php echo $arreglo[9] ?>.</th>
                                        <th><?php echo $arreglo[10] ?>.</th>
                                        <th><?php echo $arreglo[11] ?>.</th>
                                        <th><?php echo $arreglo[12] ?>.</th>
                                        <th><?php echo $arreglo[13] ?>.</th>
                                        <th><?php echo $arreglo[14] ?>.</th>
                                        <th><?php echo $arreglo[15] ?>.</th>
                                        <th><?php echo $arreglo[16] ?>.</th>
                                        <th><?php echo $arreglo[17] ?>.</th>
                                        <td>
                                            <form> <a href="<?php if ($arreglo[0] <> "") {
                                                                    echo "modificarCitas_Medicas.php?key=".urldecode($arreglo[0]);
                                                                } ?>">
                                                    <button type="button" name="modificar" value="modificar"
                                                        class="btn btn-success btn-raised btn-xs">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button></a>
                                            </form>
                                        </td>
                                        <td>
                                            <form> <a href="<?php if ($arreglo[0] <> "") {
                                                                    echo "eliminarCitas_Medicas.php?key=" . urldecode($arreglo[0]);
                                                                } ?>">
                                                    <button type="button" name="eliminar" value="eliminar"
                                                        class="btn btn-danger btn-raised btn-xs">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button></a>
                                            </form>
                                        </td>
                                    </tr>
                                <tbody>
                                    <?php
                                         } while ($arreglo = mysqli_fetch_row($resultado));
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <div>
                    <nav class="text-center">
                        <ul class="pagination pagination-sm">
                            <li class="disabled"><a href="javascript:void(0)">«</a></li>
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)">5</a></li>
                            <li><a href="javascript:void(0)">»</a></li>
                        </ul>
                    </nav>
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