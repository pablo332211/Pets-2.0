<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_HistoriaClinicaCirugia.php";
include "../../../Modelo/modelo_MedicamentoCirugia.php";
include "../../../Modelo/modelo_Cirugia.php";

?>

<?php
$DocM = $_GET['DocM'];
$llave = $_GET['key'];
echo $llave;
$clas = new Conexion;
$conecta = $clas->conectarServidor();
$query = "SELECT Codigo_HistoriaClinica, FK_CodigoMascota,Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
$resultado = mysqli_query($conecta, $query);
$arregloHC = mysqli_fetch_row($resultado);
$obj->Codigo_HistoriaClinica = $arregloHC[0];
$obj->FK_CodigoMascota = $arregloHC[1];
$obj->Nombre_Mascota = $arregloHC[2];
?>

<?php
//------------------ MODIFICAR MASCOTA ------------------------//
$obj = new medicamento_Cirugia;
$obj = new historiaClinica_Cirugia;
$obj = new cirugia;

$CodC = $_GET['CodC'];
//echo $llave;
if (isset($_POST['eliminar'])) {

    //Dato medicamento cirugua
    $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];

    //Dato historia clinica cirugua
    $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
    $obj->FK_CodigoCirugia = $_POST['Codigo_Cirugia'];

    //Datos cirugia
    $obj->Codigo_Cirugia = $_POST['Codigo_Cirugia'];
    $obj->Fecha_Cirugia = $_POST['Fecha_Cirugia'];
    $obj->NombrePaciente_Cirugia = $_POST['NombrePaciente_Cirugia'];
    $obj->Especie_Cirugia = $_POST['Especie_Cirugia'];
    $obj->Raza_Cirugia = $_POST['Raza_Cirugia'];
    $obj->Sexo_Cirugia = $_POST['Sexo_Cirugia'];
    $obj->Edad_Cirugia = $_POST['Edad_Cirugia'];
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


    //HISTORIA CLINICA CIRUGIA
    $obj->FK_CodigoCirugia = "";
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
    $obj->Direccion_Cirugia =  "";
    $obj->Celular_Cirugia =  "";
    $obj->PreQuirurgicos =  "";
    $obj->AutorizaCirugia_Cirugia =  "";
    $obj->Observacion_Cirugia =  "";
} else {
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * FROM cirugia WHERE Codigo_Cirugia = '$CodC'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);

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

    $query = "SELECT m.Codigo_Medicamento,m.Nombre_Medicamento, m.Presentacion_Medicamento,mc.Dosis_MedicamentoCirugia,mc.Administracion_MedicamentoCirugia,mc.Observacion_MedicamentoCirugia FROM medicamento m INNER JOIN medicamento_cirugia mc WHERE mc.FK_CodigoCirugia = '$CodC' AND mc.FK_CodigoMedicamento = m.Codigo_Medicamento";
    $resultado = mysqli_query($conecta, $query);
    $arregloM = mysqli_fetch_row($resultado);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eliminar cirugia</title>
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
                        <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM<?php echo urldecode($DocM) ?>" title="escritorio">
                            <i class="zmdi zmdi-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>" title="Historias Clinicas">
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
                            <a href="../citas_medicas/CitaMedica_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
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
                        <li>
                            <a href="../certificaciones/Certificaciones_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0]) ?>&DocM=<?php echo urldecode($DocM) ?>">
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
                    <a href="../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Eliminar cirugia de <?php echo $arregloHC[2]; ?></h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="Cirugias_HistoriaClinica.php?key=<?php echo urlencode($arregloHC[0]) ?>&CodC=<?php echo urlencode($CodC) ?>&DocM=<?php echo urldecode($DocM) ?>" class="btn btn-success">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; CIRUGIAS
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>
        <!-- Formulario -->
        <div class="container-fluid">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-delete"></i>&nbsp;Eliminar Cirugia</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" id="">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo</label>
                                            <input class="form-control" type="text" id="Codigo_Cirugia" name="Codigo_Cirugia" maxlength="40" value="<?php echo $obj->Codigo_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label"></label>
                                            <input class="form-control" type="date" id="Fecha_Cirugia" name="Fecha_Cirugia" maxlength="40" value="<?php echo $obj->Fecha_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre del paciente</label>
                                            <input class="form-control" type="text" id="NombrePaciente_Cirugia" name="NombrePaciente_Cirugia" maxlength="40" value="<?php echo $obj->NombrePaciente_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Especie</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Especie_Cirugia" id="Especie_Cirugia" maxlength="40" value="<?php echo $obj->Especie_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Raza</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Raza_Cirugia" id="Raza_Cirugia" maxlength="40" value="<?php echo $obj->Raza_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sexo</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Sexo_Cirugia" id="Sexo_Cirugia" maxlength="40" value="<?php echo $obj->Sexo_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Edad</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Edad_Cirugia" id="Edad_Cirugia" maxlength="40" value="<?php echo $obj->Edad_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Peso</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Peso_Cirugia" id="Peso_Cirugia" maxlength="40" value="<?php echo $obj->Peso_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo de procedimiento</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="TipoProcedimiento_Cirugia" id="TipoProcedimiento_Cirugia" maxlength="40" value="<?php echo $obj->TipoProcedimiento_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo de anestecia</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="TipoAnestecia_Cirugia" id="TipoAnestecia_Cirugia" maxlength="40" value="<?php echo $obj->TipoAnestecia_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre del propietario</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="NombrePropietario_Cirugia" id="NombrePropietario_Cirugia" maxlength="40" value="<?php echo $obj->NombrePropietario_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Identificacion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Identificacion_Cirugia" id="Identificacion_Cirugia" maxlength="40" value="<?php echo $obj->Identificacion_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Direccion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Direccion_Cirugia" id="Direccion_Cirugia" maxlength="40" value="<?php echo $obj->Direccion_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Celular</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="Celular_Cirugia" id="Celular_Cirugia" maxlength="40" value="<?php echo $obj->Celular_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Pre Quirurgicos</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="PreQuirurgicos" id="PreQuirurgicos" maxlength="40" value="<?php echo $obj->PreQuirurgicos; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Autorizacion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control" type="text" name="AutorizaCirugia_Cirugia" id="AutorizaCirugia_Cirugia" maxlength="40" value="<?php echo $obj->AutorizaCirugia_Cirugia; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Observacion Remision </label>
                                            <textarea class="form-control" type="text" name="Observacion_Cirugia" id="Observacion_Cirugia" size="40" rows="7" readOnly><?php echo $obj->Observacion_Cirugia ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <p class="text-center" style="margin-top: 20px;">
                            <input type="hidden" name="FK_CodigoHistoriaClinica" id="FK_CodigoHistoriaClinica" value="<?php echo $arregloHC[0] ?>" readOnly size="30">
                        </p>
                        <br>
                        <hr size="2px" color="black" />
                        <div class="container-fluid">
                            <div class="page-header">
                                <h1 class="text-titles">Formula Medica</h1>
                            </div>
                        </div>
                        <!-- panel lista de historias -->
                        <div class="container-fluid">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA MEDICAMENTOS</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">CODIGO</th>
                                                    <th class="text-center">NOMBRE MEDICAMENTO</th>
                                                    <th class="text-center">PRESENTACION</th>
                                                    <th class="text-center">DOSIS</th>
                                                    <th class="text-center">ADMINISTRACION</th>
                                                    <th class="text-center">OBSERVACION</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if ($arregloM > 0) {
                                                do {
                                            ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $arregloM[0]; ?></td>
                                                            <td><?php echo $arregloM[1]; ?></td>
                                                            <td><?php echo $arregloM[2]; ?></td>
                                                            <td><?php echo $arregloM[3]; ?></td>
                                                            <td><?php echo $arregloM[4]; ?></td>
                                                            <td><?php echo $arregloM[5]; ?></td>
                                                        </tr>
                                                    </tbody>
                                            <?php
                                                } while ($arregloM = mysqli_fetch_row($resultado));
                                            } else {
                                                echo "No existen Registros";
                                            }
                                            ?>
                                        </table>
                                        <input class="form-control" type="hidden" id="FK_CodigoCirugia" name="FK_CodigoCirugia" maxlength="40" value="<?php echo $obj->Codigo_Cirugia; ?>" readonly>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" name="eliminar" class="btn btn-danger btn-raised btn-xl">eliminar</button>
                        </p>




                    </form>
                </div>
            </div>
        </div>

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