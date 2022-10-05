<?php
    include "../../../Conexion/conexion.php";
?>

<?php
$llave = $_GET['key'];
$DocM = $_GET['DocM'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];
?>



<?php
    $correrPagina = $_SERVER["PHP_SELF"]; /* es una variable súper global que retorna el nombre del archivo que actualmente está ejecutando el script. Así que, $_SERVER[“PHP_SELF”] envía los datos del formulario a la misma página, en vez de saltar a una página distinta*/
    $maximoDatos = 5;
    $paginaNumero = 0;

    if(isset($_GET['paginaNumero'])){
    $paginaNumero = $_GET['paginaNumero'];
    }
    $inicia = $paginaNumero * $maximoDatos;
?>

<?php

$CodH = $_GET['CodH'];
//---------------------------------------LISTAR TABLA PROPIETARIO---------------------------------------//
    if(isset($_POST['consulta'])){
     //echo "<script>alert('llegue prop')</script>";
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $query = "SELECT * FROM examen WHERE Codigo_Mascota LIKE '%$obj->Codigo_Mascota%' ";
            $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
            $resultado = mysqli_query($conecta,$limite);
            $arreglo = mysqli_fetch_row($resultado);
            
    }else{
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $query = "SELECT b.Codigo_Bitacora,b.FechaActual_Bitacora FROM bitacora b INNER JOIN hospitalizacion_bitacora hb WHERE hb.FK_CodigoHospitalizacion = '$CodH' AND b.Codigo_Bitacora = hb.FK_CodigoBitacora";
            echo $query;
            $limite =sprintf("%s limit %d, %d",$query, $inicia, $maximoDatos);
            $resultado = mysqli_query($conecta,$limite);
            $arreglo = mysqli_fetch_row($resultado);
    }
?>

<?php
if(isset($_GET['totalArreglo'])){
	$totalArreglo = $_GET['totalArreglo'];
}
	else{
		$lista = mysqli_query($conecta,$query);
		$totalArreglo = mysqli_num_rows($lista);
	}
    $totalPagina = ceil($totalArreglo/$maximoDatos)-1;
?>

<?php
$cargarPagina = "";
if(!empty($_SERVER['QUERY_STRING'])){ /* Consulta una cadena de la base de datos empty(vacio) */
	$parametro1 = explode("&", $_SERVER['QUERY_STRING']); /* Divide la consulta para meterla en un arreglo */
	$nuevoParametro = array();
	foreach($parametro1 as $parametro2){
			if(stristr($parametro2, "paginaNumero")==false && stristr($parametro2, "totalArreglo")==false){ //Compara una cadena dentro de otra cadena
				 array_push($nuevoParametro, $parametro2);
			}
	}
	if(count($nuevoParametro)!=0){
		$cargarPagina = "&". htmlentities(implode("&", $nuevoParametro));
	}
}
$cargarPagina = sprintf("&totalArreglo=%d%s", $totalArreglo, $cargarPagina);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>desk_full</title>
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
                            <a href="../cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]);?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
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
                                <a href="../citas_medicas/CitaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Cita medica
                                </a>
                            </li>
                            <li>
                                <a href="../formula_medica/FormulaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Formula medica
                                </a>
                            </li>
                            <li>
                                <a href="../examenes/Examenes_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Exámenes
                                </a>
                            </li>
                            <li>
                                <a href="../agendar_cita/AgendarCita_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Agendar cita
                                </a>
                            </li>
                            <li>
                                <a href="../hospitalizaciones/Hospitalizaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Hospitalizaciones
                                </a>
                            </li>                                           
                            <li>
                                <a href="../vacunacion_desparacitacion/VacunacionDesparacitacion_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Vacunación y desparacitación
                                </a>
                            </li>
                            <li>
                            <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                <i class="zmdi zmdi-folder"></i> Cirugía
                            </a>
                            </li>
                            <li>
                                <a href="../remisiones/Remisiones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Remisiones
                                </a>
                            </li>
                            <li>
                                <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                    <i class="zmdi zmdi-folder"></i> Certificaciones
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
                        <a href="<?php echo "Listar_BitacoraHC.php?key=".urldecode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; LISTAR BITACORAS
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo "Agregar_BitacoraHC.php?key=".urldecode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus">
                            </i> &nbsp; NUEVA BITACORA
                        </a>
                    </li>
                </ul>
            </div>
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
                                    <th class="text-center">FECHA INGRESO</th>                                    
                                    <th class="text-center">MODIFICAR</th>
                                    <th class="text-center">ELIMINAR</th>
                                </tr>
                            </thead>
                            <?php
                            if($arreglo>0){
                                do{
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $arreglo[0]; ?></td>
                                        <td><?php echo $arreglo[1]; ?></td>
                                        <td>
                                            <a href="Modificar_BitacoraHC.php?key=<?php echo urlencode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&CodB=<?php echo urlencode($arreglo[0])?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-success btn-raised btn-xs">
                                                <i class="zmdi zmdi-check" type="button" name="modificar" value="modificar"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="Eliminar_BitacoraHC.php?key=<?php echo urlencode($arregloHC[0])?>&CodH=<?php echo urlencode($CodH)?>&CodB=<?php echo urlencode($arreglo[0])?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-danger btn-raised btn-xs">  
                                                <i class="zmdi zmdi-delete" type="button" name="eliminar" value="eliminar"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            <?php                
                                }while($arreglo = mysqli_fetch_row($resultado));
                            }else{
                                echo "No existen Registros";
                            }
                            ?>
                        </table>
                    </div>
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