<?php
include "../../../Conexion/conexion.php";
?>

<?php
$DocM = $_GET['DocM'];
$llave = $_GET['key'];
echo $llave;

$clas = new Conexion;
$conecta = $clas->conectarServidor();
$query = "SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
$resultado = mysqli_query($conecta, $query);
$arregloHC = mysqli_fetch_row($resultado);
$obj->Codigo_HistoriaClinica = $arregloHC[0];
$obj->FK_CodigoMascota = $arregloHC[1];
$obj->Nombre_Mascota = $arregloHC[2];
?>

<?php
//paginador
$clas = new conexion();
$conecta = $clas->conectarServidor();
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from hospitalizacion where Codigo_Hospitalizacion ");
$resultado_registro = mysqli_fetch_array($sql_register);
$total_registro = $resultado_registro['total_registros'];

$pag = 5;
if (empty($_GET['pagina'])) {

    $pagina = 1;
} else {
    $pagina = $_GET['pagina'];
}

$desde = ($pagina - 1) * $pag;
$total_paginas = ceil($total_registro / $pag);

?>

<?php
$clas = new conexion();
$conecta = $clas->conectarServidor();
$query = "SELECT * FROM hospitalizacion, historiaclinica_hospitalizacion WHERE Codigo_Hospitalizacion = FK_CodigoHospitalizacion AND FK_CodigoHistoriaClinica = '$obj->Codigo_HistoriaClinica' LIMIT $desde,$pag";
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
                    <a href="search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Hospitalizaciones </h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; LISTAR HOSPITALIZACIONES
                        </a>
                    </li>
                    <li>
                        <a href="Agregar_HospitalizacionHC.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus">
                            </i> &nbsp; NUEVA HOSPITALIZACION
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <!-- panel lista de historias -->
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar Hospitalizacion</h3>
                    </div>


                    <div class="container-fluid">

                        <form method="POST" action="<?php echo "hospitalizaciones_buscar.php?key=" . urldecode($llave) ?>&DocM<?php echo urldecode($DocM) ?>" class="well">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    <div class="form-group label-floating">
                                        <span class="control-label">Ingrese CODIGO de Hospitalizacion</span>
                                        <input class="form-control" type="text" name="Codigo_Hospitalizacion" id="Codigo_Hospitalizacion" required="" />
                                        <input type="hidden" name="DocM" id="DocM" value="<?php echo $DocM; ?>">
                                        <input type="hidden" name="key" id="key" value="<?php echo $llave; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <p class="text-center">
                                        <button type="submit" name="consulta" class="btn btn-primary btn-raised btn-sm">
                                            <i class="zmdi zmdi-search"></i> &nbsp; Buscar
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </form>

                    </div>



                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE HOSPITALIZACIONES</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CODIGO</th>
                                            <th class="text-center">FECHA INGRESO</th>
                                            <th class="text-center">FECHA SALIDA</th>
                                            <th class="text-center">MODIFICAR</th>
                                            <th class="text-center">ELIMINAR</th>
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
                                                    <td>
                                                        <a href="Modificar_HospitalizacionHC.php?key=<?php echo urlencode($arregloHC[0]) ?>&CodH=<?php echo urlencode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-success btn-raised btn-xs">
                                                            <i class="zmdi zmdi-check" type="button" name="modificar" value="modificar"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="Eliminar_HospitalizacionHC.php?key=<?php echo urlencode($arregloHC[0]) ?>&CodH=<?php echo urlencode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-danger btn-raised btn-xs">
                                                            <i class="zmdi zmdi-delete" type="button" name="eliminar" value="eliminar"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        } while ($arreglo = mysqli_fetch_row($resultado));
                                    } else {
                                        echo "No existen Registros";
                                    }
                                    ?>
                                </table>
                            </div>
                            <nav class="text-center">
                                <ul class="pagination pagination-sm">
                                    <li class=""><a href="?&DocM=<?php echo $DocM ?>&key=<?php echo $llave ?>&pagina=<?php echo $pagina - 1; ?>">«</a></li>


                                    <?php
                                    for ($i = 1; $i <= $total_paginas; $i++) {


                                        echo '<li class=""><a href="?&DocM=' . $DocM . "&key=" . $llave . '&pagina=' . $i . '">' . $i . '</a></li>';
                                    }

                                    ?>
                                    <li class=""><a href="?&DocM=<?php echo $DocM ?>&key=<?php echo $llave ?>&pagina=<?php echo $pagina - 1; ?>">«</a></li>
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