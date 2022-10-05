<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_Mascota.php";
?>

<?php
$DocM = $_GET['DocM'];
if ($_POST) {
    $obj->Codigo_Mascota = $_POST['Codigo_Mascota'];
}
?>

<?php
//paginador
$clas = new conexion();
$conecta = $clas->conectarServidor();
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from mascota where FK_DocumentoPropietario ");
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
$query = "SELECT * FROM mascota WHERE FK_DocumentoPropietario LIMIT $desde,$pag";
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
?>

<?php
//------------------ MODIFICAR PROPIETARIO ------------------------//
$obj = new Mascota();

if ($_POST) {
    $obj->Codigo_Mascota = $_POST['Codigo_Mascota'];
    $obj->FK_DocumentoPropietario = $_POST['FK_DocumentoPropietario'];
    //Atributos Mascota
    $obj->Nombre_Mascota = $_POST['Nombre_Mascota'];
    $obj->Edad_Mascota = $_POST['Edad_Mascota'];
    $obj->Especie_Mascota = $_POST['Especie_Mascota'];
    $obj->Raza_Mascota = $_POST['Raza_Mascota'];
    $obj->Genero_Mascota = $_POST['Genero_Mascota'];
    $obj->Color_Mascota = $_POST['Color_Mascota'];
    $obj->Observacion_Mascota = $_POST['Observacion_Mascota'];
}
?>







<!DOCTYPE html>
<html lang="es">

<head>
    <title>PETS++</title>
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
                    <a href="<?php echo "agregar_propietario.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i> Registros
                    </a>
                </li>
                <li>
                    <a href="<?php echo "../historia_clinica/historia_clinica-buscar.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i> Historia clinica
                    </a>
                </li>
                <li>
                    <a href="<?php echo "../agendar_cita/agendar_cita-buscar-libre.php?DocM=" . urldecode($DocM) ?>">
                        <i class="zmdi zmdi-folder"></i> Agender citas
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
                    <a href="../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Registro</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="<?php echo "agregar_propietario.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; REGISTRO PROPIETARIO Y MASCOTA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "agregar_nueva_mascota.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR NUEVA MASCOTA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "Listar_Propietario.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR PROPIETARIO
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "Listar_Mascota.php?DocM=" . urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR MASCOTA
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">LISTA DE MASCOTAS</h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar mascota</h3>
                </div>

                <div class="container-fluid">
                    <form class="well" method="GET" action="<?php echo "Lista_Mascota.php?&DocM=".urldecode($DocM) ?>">


                        <div class="row">
                            <div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="form-group label-floating">
                                    <span class="control-label">INGRESE DNI DEL PROPIETARIO</span>
                                    <input class="form-control" type="text" name="FK_DocumentoPropietario" id="FK_DocumentoPropietario" value="<?php echo $obj->FK_DocumentoPropietario;  ?>" />
                                    <input type="hidden" name="DocM" id="DocM"" value=" <?php echo $DocM;  ?>" />


                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary btn-raised btn-sm" name="buscar">
                                        <i class="zmdi zmdi-search"></i> &nbsp; Buscar
                                    </button>
                                </p>
                            </div>

                        </div>

                    </form>

                </div>

                <!-- panel lista de historias -->
                <div class="container-fluid">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA MASCOTAS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-center">CODIGO</th>
                                            <th class="text-center">DNI PROPIETARIO</th>
                                            <th class="text-center">NOMBRE</th>
                                            <th class="text-center">ESPECIE</th>
                                            <th class="text-center">COLOR</th>
                                            <th class="text-center">EDAD</th>
                                            <th class="text-center">RAZA</th>
                                            <th class="text-center">GENERO</th>
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
                                                    <td><?php echo $arreglo[6]; ?></td>
                                                    <td><?php echo $arreglo[7]; ?></td>
                                                    <td>
                                                        <a href="Modificar_Mascota.php?key=<?php echo urlencode($arreglo[0]); ?>&DocM=<?php echo urlencode($DocM); ?>" class="btn btn-success btn-raised btn-xs">
                                                            <i class="zmdi zmdi-check" type="button" name="modificar" value="modificar"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="Eliminar_Mascota.php?key=<?php echo urlencode($arreglo[0]) ?>&DocM=<?php echo urlencode($DocM); ?>" class="btn btn-danger btn-raised btn-xs">
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


                                        echo '<li class=""><a href="?pagina=' . $i . '">' . $i . '</a></li>';
                                    }

                                    ?>
                                    <li><a href="?&DocM=<?php echo $DocM ?>&pagina=<?php echo $pagina + 1; ?>">»</a></li>
                                </ul>
                            </nav>
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