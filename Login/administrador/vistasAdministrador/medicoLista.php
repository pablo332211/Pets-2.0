<?php 
include "../../../Conexion/conexion.php";
include "../../../Login/administrador/modelo/Modelo_Medico.php";
?>

<?php
$obj->Documento_Medico = $_GET['Documento_Medico'];
if (empty($obj->Documento_Medico)) {
    header("location: medicoBuscar.php");
}

?>


<?php
//paginador
$clas = new conexion();
$conecta = $clas->conectarServidor();
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from medico where Documento_Medico LIKE '$obj->Documento_Medico' ");

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
$query = "SELECT * FROM medico WHERE Documento_Medico LIKE '$obj->Documento_Medico'";
echo $query;
$resultado = mysqli_query($conecta, $query);
$arreglo = mysqli_fetch_row($resultado);
?>

<?php
$obj = new medico();
if ($_POST) {

    $obj->NombreA_Medico = $_POST['NombreA_Medico'];
    $obj->NombreB_Medico = $_POST['NombreB_Medico'];
    $obj->ApellidoA_Medico = $_POST['ApellidoA_Medico'];
    $obj->ApellidoB_Medico = $_POST['ApellidoB_Medico'];
    $obj->Correo_Medico = $_POST['Correo_Medico'];
    $obj->Telefono_Medico = $_POST['Telefono_Medico'];
    $obj->Celular_Medico = $_POST['Celular_Medico'];
    $obj->Contrasena_Medico = $_POST['Contrasena_Medico'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>MEDICOSBUSCAR</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../../Vista/css/main.css">
</head>

<body>
    <!-- SideBar -->
    <section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">

            <!--tITULO -->

            <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
                PETT++ <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <figure class="full-box">
                    <img src="../../../vista/assets/avatars/AdminMaleAvatar.png" alt="UserIcon">
                    <figcaption class="text-center text-titles">Administrador</figcaption>
                </figure>
                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="" title="Mis datos">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" title="Mi cuenta">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#!" title="Salir del sistema" class="btn-exit-system">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!--  Menu GENERAL -->

            <ul class="list-unstyled full-box dashboard-sideBar-Menu">
                <li>
                    <a href="administradorDesk.php">
                        <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                        <li>
                            <a href="../../../Index.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Ver sitio web</a>
                        </li>
                        <li>
                            <a href="#"><i class="zmdi zmdi-labels zmdi-hc-fw"></i>Agregar/Buscar medicos</a>
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
                    <a href="search.html" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <!-- CONTIENE PAGINA DE MEDICOS GENERAL -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Usuario <small>MEDICO</small></h1>
            </div>

        </div>

        <div class="container-fluid">
            <ul class="breadcrumb breadcrumb-tabs">
                <li>
                    <a href="agregarMedico.php" class="btn btn-info">
                        <i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR MEDICO
                    </a>
                </li>
                <li>
                    <a href="medicoBuscar.php" class="btn btn-primary">
                        <i class="zmdi zmdi-search"></i> &nbsp; BUSCAR MEDICOS
                    </a>
                </li>
            </ul>
        </div>


        <div class="container-fluid">


            <!-- Panel para agregar medicos -->


            <!-- Panel listado de busqueda de medicos -->
            <div class="container-fluid">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="zmdi zmdi-search"></i> &nbsp; RESULTADO
                        </h3>
                    </div>
                    <form action="" name="medico" id="medico" method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr">

                                            <td class="text-center">NUMERO DNI</td>
                                            <td class="text-center">PRIMER NOMBRE</td>
                                            <td class="text-center">SEGUNDO NOMBRE</td>
                                            <td class="text-center">PRIMER APELLIDO</td>
                                            <td class="text-center">SEGUNDO APELLIDO</td>
                                            <td class="text-center">CORREO</td>
                                            <td class="text-center">TELEFONO</td>
                                            <td class="text-center">CELULAR</td>
                                            <td class="text-center">CONTRASEÑA</td>
                                            <td class="text-center">MODIFICAR</td>
                                            <td class="text-center">ELIMINAR</td>
                                            </tr>
                                    </thead>
                                    <?php
                                    do {

                                    ?>

                                        <tbody>

                                            <tr>
                                                <th><?php echo $arreglo[0]; ?>.</th>
                                                <th><?php echo $arreglo[1]; ?>.</th>
                                                <th><?php echo $arreglo[2]; ?>.</th>
                                                <th><?php echo $arreglo[3]; ?>.</th>
                                                <th><?php echo $arreglo[4]; ?>.</th>
                                                <th><?php echo $arreglo[5]; ?>.</th>
                                                <th><?php echo $arreglo[6]; ?>.</th>
                                                <th><?php echo $arreglo[7]; ?>.</th>
                                                <th><?php echo $arreglo[8]; ?>.</th>

                                                <td>
                                                    <form> <a href="<?php if ($arreglo[0] <> "") {
                                                                        echo "medicoModificar.php?key=" . urldecode($arreglo[0]);
                                                                    } ?>">
                                                            <button type="button" name="modificarmedico" value="modificarMedico" class="btn btn-danger btn-raised btn-xs">
                                                                <i class="zmdi zmdi-refresh"></i>
                                                            </button></a>
                                                    </form>
                                                </td>

                                                <td>
                                                    <form> <a href="<?php if ($arreglo[0] <> "") {
                                                                        echo "medicoEliminar.php?key=" . urldecode($arreglo[0]);
                                                                    } ?>">
                                                            <button type="button" name="eliminarMedico" value="eliminarMedico" class="btn btn-danger btn-raised btn-xs">
                                                                <i class="zmdi zmdi-refresh"></i>
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
                                
                    <p class="text-center">
                        <a href="medicoBuscar.php">
                            <button type="button" class="btn btn-primary btn-raised btn-sm" name="buscar">
                                <i class="zmdi zmdi-"></i> &nbsp; Volver
                            </button></a>
                    </p>
                            </div>
                        </div>
                        <<nav class="text-center">
                            <ul class="pagination pagination-sm">
                                <li class=""><a href="?pagina=<?php echo $pagina - 1; ?>">«</a></li>


                                <?php
                                for ($i = 1; $i <= $total_paginas; $i++) {


                                    echo '<li class=""><a href="?pagina=' . $i . '">' . $i . '</a></li>';
                                }

                                ?>
                                <li><a href="?pagina=<?php echo $pagina + 1; ?>">»</a></li>
                            </ul>
                            </nav>
                    </form>


                </div>
            </div>

        </div>
    </section>

    <!--====== Scripts -->

    <script src="../../../vistasPlataforma/js/jquery-3.1.1.min.js"></script>
    <script src="../../../vistasPlataforma/js/sweetalert2.min.js"></script>
    <script src="../../../vistasPlataforma/js/bootstrap.min.js"></script>
    <script src="../../../vistasPlataforma/js/material.min.js"></script>
    <script src="../../../vistasPlataforma/js/ripples.min.js"></script>
    <script src="../../../vistasPlataforma/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../../vistasPlataforma/js/main.js"></script>
    <script>
        $.material.init();
    </script>
</body>

</html>