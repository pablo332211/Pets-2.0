<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_ProfilacticoMascota.php";
?>

<?php
$obj = new ProfilacticoMascota;
$obj->FK_CodigoMascota;
$obj->FK_CodigoProfilactico;
?>

<?php
$correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
$maximoDatos = 5;
$paginaNumero = 0;

if (isset($_GET['paginaNumero'])) {
    $paginaNumero = $_GET['paginaNumero'];
}
$inicia = $paginaNumero * $maximoDatos;
?>

<?php
//---------------------------------------LISTAR TABLA PROPIETARIO---------------------------------------//
if (isset($_POST['consulta'])) {
    //echo "<script>alert('llegue prop')</script>";
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM profilactico_mascota WHERE FK_CodigoProfilactico LIKE '%$obj->FK_CodigoProfilactico%' ";
    $limite = sprintf("%s limit %d, %d", $query, $inicia, $maximoDatos);
    $resultado = mysqli_query($conecta, $limite);
    $arreglo = mysqli_fetch_row($resultado);
} else {
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM profilactico_mascota";
    $limite = sprintf("%s limit %d, %d", $query, $inicia, $maximoDatos);
    $resultado = mysqli_query($conecta, $limite);
    $arreglo = mysqli_fetch_row($resultado);
}
?>

<?php
if (isset($_GET['totalArreglo'])) {
    $totalArreglo = $_GET['totalArreglo'];
} else {
    $lista = mysqli_query($conecta, $query);
    $totalArreglo = mysqli_num_rows($lista);
}
$totalPagina = ceil($totalArreglo / $maximoDatos) - 1;
?>

<?php
$cargarPagina = "";
if (!empty($_SERVER['QUERY_STRING'])) { /* Consulta una cadena de la base de datos empty(vacio) */
    $parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
    $nuevoParametro = array();
    foreach ($parametro1 as $parametro2) {
        if (stristr($parametro2, "paginaNumero") == false && stristr($parametro2, "totalArreglo") == false) { //Compara una cadena dentro de otra cadena
            array_push($nuevoParametro, $parametro2);
        }
    }
    if (count($nuevoParametro) != 0) {
        $cargarPagina = "&" . htmlentities(implode("&", $nuevoParametro));
    }
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>V y D - B</title>
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

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Vacunanción y desparacitación</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="vacunacion_y_desparacitacion.php" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; NUEVA VACUNACION Y DESPARACITACIÓN
                        </a>
                    </li>
                    <li>
                        <a href="vacunacion_y_desparacitacion-buscar.php" class="btn btn-success">
                            <i class="zmdi zmdi-search">
                            </i> &nbsp; BUSCAR VACUNACION Y DESPARACITACIÓN
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--Panel de busqueda Examenes -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar pacientes con formulas
                        medicas</h3>
                </div>
                <div class="container-fluid">
                    <form class="well">
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
                    </form>
                </div>
                
                <!--PROFILACTICOS -->
                <div class="container-fluid">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; DATOS
                                PROFILACTIOS</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" name="" method="POST">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr">
                                                    <td class="text-center">Código Mascota</td>
                                                    <td class="text-center">Codigo Profilactico</td>
                                                    <td class="text-center">Fecha</td>
                                                    <td class="text-center">Dosis</td>
                                                    <td class="text-center">Administracion</td>
                                                    <td class="text-center">Observacion</td>
                                                    <td class="text-center">Modificar</td>
                                                    <td class="text-center">Eliminar</td>
                                                    <tr>
                                            </thead>
                                            <?php
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
                                                    
                                                    

                                                    <td>
                                                        <a href="./Modificar_Profilactico.php?Masc=<?php echo urlencode($arreglo[0]); ?>&Prof=<?php echo urlencode($arreglo[1]); ?>">
                                                            <button type="button" name="modificar"
                                                                class="btn btn-success btn-raised btn-xs">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button></a>
                                                        </a>
                                                    </td>
                                                    <td>

                                                        <a href="<?php if ($arreglo[1] <> "") {
                                                                    echo "./Eliminar_Profilactico.php?key=".urlencode($arreglo[1]);
                                                                }?>">
                                                            <button type="button" name="eliminar"
                                                                class="btn btn-danger btn-raised btn-xs">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            <?php
                                    } while ($arreglo = mysqli_fetch_row($resultado));
                                    ?>
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