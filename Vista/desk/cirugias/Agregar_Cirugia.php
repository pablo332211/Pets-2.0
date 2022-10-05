<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_Cirugia.php";
include "../../../Modelo/modelo_HistoriaClinicaCirugia.php";
?>

<?php
$DocM = $_GET['DocM'];
$llave = $_GET['key'];
echo $llave;


$clas = new Conexion;
$conecta = $clas->conectarServidor();
$query = "SELECT Codigo_HistoriaClinica,FK_CodigoMascota,Nombre_Mascota,FK_EspecieMascota,FK_GeneroMascota,Edad_Mascota FROM historia_clinica, mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
echo $query;
$resultado = mysqli_query($conecta, $query);
$arregloHC = mysqli_fetch_row($resultado);
$obj->Codigo_HistoriaClinica = $arregloHC[0];
$obj->FK_CodigoMascota = $arregloHC[1];
$obj->Nombre_Mascota = $arregloHC[2];
$obj->FK_EspecieMascota = $arregloHC[3];
$obj->FK_GeneroMascota = $arregloHC[4];
$obj->Edad_Mascota = $arregloHC[5];
?>

<?php


if (isset($_POST['agregar'])) {

    $obj = new historiaClinica_Cirugia();
    $obj = new cirugia();

    $obj->Fecha_Cirugia = $_POST['Fecha_Cirugia'];
    $obj->Peso_Cirugia = $_POST['Peso_Cirugia'];
    $obj->TipoProcedimiento_Cirugia = $_POST['TipoProcedimiento_Cirugia'];
    $obj->TipoAnestecia_Cirugia = $_POST['TipoAnestecia_Cirugia'];
    $obj->NombrePropietario_Cirugia = $_POST['NombrePropietario_Cirugia'];
    $obj->Identificacion_Cirugia = $_POST['Identificacion_Cirugia'];
    $obj->Direccion_Cirugia = $_POST['Direccion_Cirugia'];
    $obj->Celular_Cirugia = $_POST['Celular_Cirugia'];
    $obj->PreQuirurgicos = $_POST['PreQuirurgicos'];
    $obj->AutorizaCirugia_Cirugia = $_POST['AutorizaCirugia_Cirugia'];
    $obj->Observacion_Cirugia = $_POST['Observacion_Cirugia'];

    $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];

    $llave = $_GET['key'];
    echo $llave;
    $clas = new Conexion;
    $conecta = $clas->conectarServidor();
    $query = "SELECT Codigo_HistoriaClinica, FK_CodigoMascota,Nombre_Mascota,Especie_Mascota,Raza_Mascota,FK_GeneroMascota,Edad_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta, $query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota = $arregloHC[2];
    $obj->Especie_Mascota = $arregloHC[3];
    $obj->FK_GeneroMascota = $arregloHC[5];
    $obj->Edad_Mascota = $arregloHC[6];

    //HISTORIA CLINICA CIRUGIA
    $query = "SELECT * FROM cirugia ORDER BY Codigo_Cirugia DESC LIMIT 1";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);

    //CIRUGIA
    $obj->Codigo_Cirugia = $arreglo[0];
    $obj->Fecha_Cirugia = $arreglo[1];
    $obj->NombrePaciente_Cirugia = $arreglo[2];
    $obj->Especie_Cirugia = $arreglo[3];
    $obj->Raza_Cirugia = $arreglo[4];
    $obj->Sexo_Cirugia = $arreglo[5];
    $obj->Edad_Cirugia = $arreglo[6];
    $obj->Peso_Cirugia = $arreglo[7];
    $obj->TipoProcedimiento_Cirugia = $arreglo[8];
    $obj->TipoAnestecia_Cirugia = $arreglo[9];
    $obj->NombrePropietario_Cirugia = $arreglo[10];
    $obj->Identificacion_Cirugia = $arreglo[11];
    $obj->Direccion_Cirugia = $arreglo[12];
    $obj->Celular_Cirugia = $arreglo[13];
    $obj->PreQuirurgicos = $arreglo[14];
    $obj->AutorizaCirugia_Cirugia = $arreglo[15];
    $obj->Observacion_Cirugia = $arreglo[16];
} else {
    //CIRUGIA
    $obj->Codigo_Cirugia = "";
    $obj->Fecha_Cirugia = "";
    $obj->NombrePaciente_Cirugia = "";
    $obj->Especie_Cirugia = "";
    $obj->Raza_Cirugia = "";
    $obj->Sexo_Cirugia = "";
    $obj->Edad_Cirugia = "";
    $obj->Peso_Cirugia = "";
    $obj->TipoProcedimiento_Cirugia = "";
    $obj->TipoAnestecia_Cirugia = "";
    $obj->NombrePropietario_Cirugia =  "";
    $obj->Identificacion_Cirugia =  "";
    $obj->Direccion_Cirugia = "";
    $obj->Celular_Cirugia =  "";
    $obj->PreQuirurgicos =  "";
    $obj->AutorizaCirugia_Cirugia =  "";
    $obj->Observacion_Cirugia =  "";
}
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
                        <a href="../cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM) ?>" title="Mi cuenta">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>
                    </li>
                    <!--  <li>
                        <a href="../../desk_full.php?key=<//?php echo urldecode($arreglo[0]) ?>&DocM=<//?php echo urldecode($DocM) ?>" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li> -->
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
                            <a href="../formula_medica/FormulaMedica_HistoriaClinica.php?key=" . urldecode($arreglo[0]); ?>">
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
                <h1 class="text-titles">Cirugia de <?php echo $arregloHC[2]; ?></h1>
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

        <!-- Formulario de cita medica -->
        <div class="container-fluid">
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; INGRESE DATOS DE LA CIRUGIA</h3>
                </div>

                <div class="panel-body">
                    <form method="POST" id="cirugia">
                        <div>
                            <fieldset>
                                <div class="container-fluid">
                                    <div class="row">


                                        <input class="form-control" type="hidden" id="Codigo_Cirugia" name="Codigo_Cirugia" maxlength="40" value="<?php echo $obj->Codigo_Cirugia ?>">


                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label"></label>
                                                <input class="form-control" type="date"  id="Fecha_Cirugia" name="Fecha_Cirugia" value="<?php echo $obj->Fecha_Cirugia ?>" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre del paciente</label>
                                                <input class="form-control" type="text" id="NombrePaciente_Cirugia" name="NombrePaciente_Cirugia" readonly maxlength="40" value="<?php echo $obj->Nombre_Mascota ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Especie</label>
                                                <?php
                                                $clas = new Conexion();
                                                $conecta = $clas->conectarServidor();
                                                $query = "SELECT * FROM especie WHERE Codigo_Especie='$obj->FK_EspecieMascota'";
                                                $resultado = mysqli_query($conecta, $query);
                                                $especie = mysqli_fetch_row($resultado);
                                                if($especie > 1){
                                                    do {
                                                ?>
                                                        <input type="hidden" name="FK_EspecieMascota" id="FK_EspecieMascota" readOnly value="<?php echo $especie[0];?>" maxlength="40">
                                                        <input class="form-control" type="text"readOnly value="<?php echo $especie[1];?>" maxlength="40">   
                                                <?php
                                                        } while ($especie = mysqli_fetch_row($resultado));
                                                }
                                                else{
                                                ?>
                                                        <input class="form-control" type="text" readOnly value="" maxlength="15">   
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Genero</label>
                                                <?php
                                                    $clas = new Conexion();
                                                    $conecta = $clas->conectarServidor();
                                                    $query = "SELECT * FROM genero WHERE Codigo_Genero='$obj->FK_GeneroMascota'";
                                                    $resultado = mysqli_query($conecta, $query);
                                                    $genero = mysqli_fetch_row($resultado);
                                                    if($genero > 1){
                                                        do {
                                                ?>  
                                                        <input type="hidden" name="FK_GeneroMascota" id="FK_GeneroMascota" readOnly value="<?php echo $genero[0];?>" maxlength="40">
                                                        <input class="form-control" type="text" readOnly value="<?php echo $genero[1];?>" maxlength="15">   
                                                <?php
                                                        } while ($genero = mysqli_fetch_row($resultado));
                                                    }
                                                    else{
                                                ?>
                                                        
                                                        <input class="form-control" type="text" readOnly value="" maxlength="15">   
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Edad</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Edad_Cirugia" id="Edad_Cirugia" maxlength="40" readonly value=" <?php echo $obj->Edad_Mascota ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Peso</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" required class="form-control" type="text" name="Peso_Cirugia" id="Peso_Cirugia" maxlength="45" value=" <?php echo $obj->Peso_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de procedimiento</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" required class="form-control" type="text" name="TipoProcedimiento_Cirugia" id="TipoProcedimiento_Cirugia" maxlength="45" value=" <?php echo $obj->TipoProcedimiento_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de anestecia</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" required class="form-control" type="text" name="TipoAnestecia_Cirugia" id="TipoAnestecia_Cirugia" maxlength="45" value=" <?php echo $obj->TipoAnestecia_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre del propietario</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" required class="form-control" type="text" name="NombrePropietario_Cirugia" id="NombrePropietario_Cirugia" maxlength="45" value=" <?php echo $obj->NombrePropietario_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Identificacion</label>
                                                <input pattern="[0-9-]{1,20}" required class="form-control" type="text" name="Identificacion_Cirugia" id="Identificacion_Cirugia" maxlength="20" value=" <?php echo $obj->Identificacion_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Direccion</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" class="form-control" required type="text" name="Direccion_Cirugia" id="Direccion_Cirugia" maxlength="45" value=" <?php echo $obj->Direccion_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Celular</label>
                                                <input pattern="[0-9-]{1,20}" class="form-control"  type="text" name="Celular_Cirugia" id="Celular_Cirugia" maxlength="20" value=" <?php echo $obj->Celular_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Pre Quirurgicos</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" class="form-control" type="text" name="PreQuirurgicos" id="PreQuirurgicos" maxlength="45" required value=" <?php echo $obj->PreQuirurgicos ?> ">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Autorizacion</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,45}" class="form-control" type="text" name="AutorizaCirugia_Cirugia" id="AutorizaCirugia_Cirugia" required maxlength="45" value=" <?php echo $obj->AutorizaCirugia_Cirugia ?> ">
                                            </div>
                                        </div>
                                        <br> 
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Observacion Remision </label>
                                                <textarea class="form-control" pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,400}" maxlength="400" type="text" name="Observacion_Cirugia" id="Observacion_Cirugia" size="40" rows="7" required ><?php echo $obj->Observacion_Cirugia ?></textarea>
                                            </div>
                                        </div>
                                       
                                        <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $arregloHC[0] ?>" size="30">
                                    </div>
                                </div>
                            </fieldset>
                            <p class="text-center" style="margin-top: 20px;">
                                <button class="btn btn-info btn-raised btn-sm" name="agregar" type="submit">GENERAR CIRUGIA</button>
                            </p>
                            <p class="text-center" style="margin-top: 20px;">
                                <a class="btn btn-info btn-raised btn-sm" href="../medicamentos/Listar_MedicamentoCirugia.php?key=<?php echo urlencode($arregloHC[0]) ?>&CodC=<?php echo urlencode($obj->Codigo_Cirugia) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-info">AGREGAR MEDICAMENTOS</a>
                            </p>
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