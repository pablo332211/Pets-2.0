<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/controlador_CitaMedicaPropietario.php";
?>

<?php

$DocM = $_GET['DocM'];
$obj->FK_DocumentoPropietario = $_GET['FK_DocumentoPropietario'];
if (empty($obj->FK_DocumentoPropietario)) {
    header("location: agendar_cita-buscar-libre.php?&DocM=" . urldecode($DocM));
}

?>


<?php
//paginador
$clas = new conexion();
$conecta = $clas->conectarServidor();
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from propietario_citamedica where FK_DocumentoPropietario LIKE '$obj->FK_DocumentoPropietario' ");
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
$query = "SELECT * FROM propietario_citamedica WHERE FK_DocumentoPropietario LIKE '$obj->FK_DocumentoPropietario'";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
echo $query;

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
                        <a href="../cuenta/mi_cuenta.php" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../../desk.php" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../../index.php" title="Salir del sistema">
                            <i class="zmdi zmdi-mail-reply"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- SideBar Menu -->
            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="../registro/Agregar_propietario.php">
                        <i class="zmdi zmdi-folder"></i> Registros
                    </a>
                </li>
                <li>
                    <a href="../historia_clinica/historia_clinica-buscar.php">
                        <i class="zmdi zmdi-folder"></i> Historia clinica
                    </a>
                </li>
                <li>
                    <a href="../Agendar_cita/Agendar_cita-libre.php">
                        <i class="zmdi zmdi-folder"></i> Agender citas
                    </a>
                </li>
                <li>
                    <a href="../vacunacion_desparacitacion/vacunacion_y_desparacitacion-libre.php">
                        <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                    </a>
                </li>
                <li>
                    <a href="../certificaciones/certificaciones-libre.php">
                        <i class="zmdi zmdi-folder"></i> Certificaciones
                    </a>
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
                    <a href="../../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- botones de crear y bucar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Agendar citas medicas</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-libre.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGENDAR CITA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=".urldecode($DocM) ?>" class="btn btn-success">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CITAS
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- panel de busqueda -->



        <form class="well" method="POST">
            <div class="container-fluid">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Resultado</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">CODIGO CITA</th>
                                        <th class="text-center">DNI</th>
                                        <th class="text-center">FECHA</th>
                                        <th class="text-center">OBSERVACION </th>
                                        <th class="text-center">EDITAR </th>
                                        <th class="text-center">ELIMINAR </th>
                                    </tr>
                                </thead>
                                <?php

                                do {
                                ?>
                                    <tbody>
                                        <tr>

                                            <td><?php echo $arreglo[1]; ?></td>
                                            <td><?php echo $arreglo[0]; ?></td>
                                            <td><?php echo $arreglo[2]; ?></td>
                                            <td><?php echo $arreglo[3]; ?></td>
                                            <td>
                                                <a href="Modificar_CitaMedica.php?key=<?php echo urlencode($arreglo[1]) ?>&DocM=<?php echo urlencode($DocM) ?>" class="btn btn-success btn-raised btn-xs">
                                                    <i class="zmdi zmdi-check" type="button" name="modificar" value="modificar"></i>
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

                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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