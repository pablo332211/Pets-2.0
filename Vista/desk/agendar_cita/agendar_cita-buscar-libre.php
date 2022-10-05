<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_CitaMedicaPropietario.php";
?>

<?php

$DocM = $_GET ['DocM'];


if ($_POST) {
    $obj->FK_CodigoCitaMedica = $_POST['FK_CodigoCitaMedica'];
}
?>

<?php
//paginador
$clas = new conexion();
$conecta = $clas->conectarServidor();
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from propietario_citamedica where FK_CodigoCitaMedica ");
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
$query = "SELECT * FROM propietario_citamedica WHERE FK_CodigoCitaMedica LIMIT $desde,$pag";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
?>
<?php
$obj = new citaMedica_Propietario();
if ($_POST) {
    $obj->FK_DocumentoPropietario = $_POST['FK_DocumentoPropietario'];
    $obj->FK_CodigoCitaMedica = $_POST['FK_CodigoCitaMedica'];
    $obj->Fecha_CitaMedica = $_POST['Fecha_CitaMedica'];
    $obj->Observacion_CitaMedica = $_POST['Observacion_CitaMedica'];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agendar cita B</title>
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
                        <a href="<?php echo "../cuenta/mi_cuenta.php?DocM=" . urldecode($DocM) ?>" title="Perfil">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../../desk.php?DocM=" . urldecode($DocM) ?>" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="<?php echo "../registro/agregar_propietario.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i> Registros
                    </a>
                </li>
                <li>
                    <a href="<?php echo "../historia_clinica/historia_clinica-buscar.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i>Historia clinica
                    </a>
                </li>
                <li>
                    <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i> Agendar citas
                    </a>
                </li>
                <li>
                    <a href="<?php echo "../vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php?DocM=" . urldecode($DocM) ?>">
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
                    <a href="../../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- botones de crear y bucar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">AGENDAR CITA MEDICA</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i>&nbsp;AGENDAR CITA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=" . urldecode($DocM) ?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i>&nbsp;BUSCAR AGENDA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- panel de busqueda -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar Citas Medicas</h3>
                </div>
                
                
                
                    <form method="GET" action=<?php echo "agengar_cita-lista-libre.php?&DocM=".urldecode($DocM) ?> class="well">
                        <div class="row">
                            <div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="form-group label-floating">
                                    <span class="control-label">Ingrese el DNI del propetario</span>
                                    <input  pattern="[0-9-]{1,20}" required class="form-control" type="text" <?php echo $obj->FK_DocumentoPropietario ?> name="FK_DocumentoPropietario" id="FK_DocumentoPropietario" required="" />
                                    <input type="hidden" name="DocM" id="DocM" value="<?php echo $DocM; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p class="text-center">
                                    <button type="submit" name="buscar" class="btn btn-primary btn-raised btn-sm">
                                        <i class="zmdi zmdi-search"></i> &nbsp; Buscar
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CITAS MEDICAS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">DNI</th>
                                            <th class="text-center">CODIGO CITA</th>
                                            <th class="text-center">FECHA</th>
                                            <th class="text-center">OBSERVACION </th>
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
                                                    <td><?php echo $arreglo[3]; ?></td>
                                                    <td>
                                                        <a href="Modificar_CitaMedica.php?key=<?php echo urlencode($arreglo[1]) ?>&DocM=<?php echo urlencode($DocM) ?>" class="btn btn-success btn-raised btn-xs">
                                                            <i class="zmdi zmdi-edit" type="button" name="modificar" value="modificar"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="Eliminar_CitaMedica.php?key=<?php echo urlencode($arreglo[1]) ?>&DocM=<?php echo urlencode($DocM) ?>" class="btn btn-danger btn-raised btn-xs">
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

                                    <li class=""><a href="?&DocM=<?php echo $DocM ?>&pagina=<?php echo $pagina - 1; ?>">«</a></li>


                                    <?php
                                    for ($i = 1; $i <= $total_paginas; $i++) {


                                        echo   '<li class=""><a href="?&DocM='. $DocM .'&pagina=' . $i . '">' . $i . '</a></li>';
                                    }

                                    ?>
                                    <li><a href="?&DocM=<?php echo $DocM ?>&pagina=<?php echo $pagina + 1; ?>">»</a></li>
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