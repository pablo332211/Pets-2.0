<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_Cirugia.php";
?>

<?php
$llave = $_GET['key'];
$DocM = $_GET['DocM'];
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
$sql_register = mysqli_query($conecta, "SELECT COUNT(*) AS total_registros from cirugia where Codigo_Cirugia ");
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
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM cirugia,historiaclinica_cirugia WHERE Codigo_Cirugia = FK_CodigoCirugia AND FK_CodigoHistoriaClinica = '$obj->Codigo_HistoriaClinica'  LIMIT $desde,$pag";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cirugias</title>
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
                        <a href="../cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM) ?>" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../../desk_full.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" title="escritorio">
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
                            <a href="../citas_medicas/CitaMedica_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Cita medica
                            </a>
                        </li>
                        <li>
                            <a href="../formula_medica/FormulaMedica_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Formula medica
                            </a>
                        </li>
                        <li>
                            <a href="../examenes/Examenes_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Exámenes
                            </a>
                        </li>
                        <li>
                            <a href="../agendar_cita/AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Agendar cita
                            </a>
                        </li>
                        <li>
                            <a href="../hospitalizaciones/Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Hospitalizaciones
                            </a>
                        </li>
                        <li>
                            <a href="../vacunacion_desparacitacion/VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                            </a>
                        </li>
                        <li>
                            <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Cirugía
                            </a>
                        </li>
                        <li>
                            <a href="../remisiones/Remisiones_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Remisiones
                            </a>
                        </li>
                        <li>
                            <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                <i class="zmdi zmdi-folder"></i> Certificaciones
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        </div>
    </section>


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
                <h1 class="text-titles">Cirugias de <?php echo $arregloHC[2]; ?></h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTAR CIRUGIA
                        </a>
                    </li>
                    <li>
                        <a href="Agregar_Cirugia.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; AGREGAR CIRUGIA
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Panel listado de busqueda de propietarios -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; Buscar cirugia</h3>
                </div>

                <div class="container-fluid">

                
                    <form class="well" method="POST" action="<?php echo "Lista_cirugia.php?key=".urldecode($llave)?>&DocM<?php echo urldecode($DocM)?>">
                        


                        <div class="row">
                            <div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="form-group label-floating">
                                    <span class="control-label">INGRESE CODIGO DE CIRUGIA</span>
                                    <input class="form-control" type="text" name="Codigo_Cirugia" id="Codigo_Cirugia"  pattern="[0-9-]{1,20}" required />
                                    <input type="hidden" name="DocM" id="DocM" value="<?php echo $DocM; ?>">
                                    <input type="hidden" name="key" id="key" value="<?php echo $llave; ?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-primary btn-raised btn-sm" name="resultado">
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
                            <h3 class="panel-title">
                                <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE CIRUGIAS
                            </h3>
                        </div>
                        <form action="" name="propietario" id="propietario" method="POST">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead>
                                            <tr">
                                                <td class="text-center">COD CIRUGIA</td>
                                                <td class="text-center">FECHA</td>
                                                <td class="text-center">PACIENTE</td>
                                                <td class="text-center">ESPECIE</td>
                                                <td class="text-center">RAZA</td>
                                                <td class="text-center">PROPIETARIO</td>
                                                <td class="text-center">DIRECCION</td>
                                                <td class="text-center">CELULAR</td>
                                                <td class="text-center">MODIFICAR</td>
                                                <td class="text-center">ELIMINAR</td>
                                                </tr>
                                        </thead>
                                        <?php

                                        if ($arreglo > 0) {
                                            do {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo $arreglo[0] ?>.</th>
                                                        <th><?php echo $arreglo[1] ?>.</th>
                                                        <th><?php echo $arreglo[2] ?>.</th>
                                                        <th><?php echo $arreglo[3] ?>.</th>
                                                        <th><?php echo $arreglo[4] ?>.</th>
                                                        <th><?php echo $arreglo[10] ?>.</th>
                                                        <th><?php echo $arreglo[12] ?>.</th>
                                                        <th><?php echo $arreglo[13] ?>.</th>


                                                        <td>
                                                            <form> <a href="Modificar_Cirugia.php?key=<?php echo urldecode($arregloHC[0]) ?>&CodC=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                                                    <button type="button" name="modificar" value="modificar" class="btn btn-success btn-raised btn-xs">
                                                                        <i class="zmdi zmdi-edit"></i>
                                                                    </button></a>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form> <a href="Eliminar_Cirugia.php?key=<?php echo urldecode($arregloHC[0]) ?>&CodC=<?php echo urldecode($arreglo[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
                                                                    <button type="button" name="eliminar" value="eliminar" class="btn btn-danger btn-raised btn-xs">
                                                                        <i class="zmdi zmdi-delete"></i>
                                                                    </button></a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <tbody>
                                            <?php
                                            } while ($arreglo = mysqli_fetch_row($resultado));
                                        }
                                            ?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>

                        <div>
                        <nav class="text-center">
                                <ul class="pagination pagination-sm">
                                    <li class=""><a href="?&DocM=<?php echo $DocM ?>&key=<?php echo $llave?>&pagina=<?php echo $pagina - 1; ?>">«</a></li>


                                    <?php
                                    for ($i = 1; $i <= $total_paginas; $i++) {


                                        echo '<li class=""><a href="?&DocM='. $DocM ."&key=". $llave .'&pagina=' . $i . '">' . $i . '</a></li>';
                                    }

                                    ?>
                                    <li class=""><a href="?&DocM=<?php echo $DocM ?>&key=<?php echo $llave?>&pagina=<?php echo $pagina + 1; ?>">»</a></li>

                                </ul>
                            </nav>
                        </div>

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