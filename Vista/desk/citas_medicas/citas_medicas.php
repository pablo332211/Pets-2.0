<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_CitaMedica.php";
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

$obj = new cita_medica();

//datos tomados en la historia clinica
if ($_POST) {

    //Llave foranea Medico
    //$obj->FK_DocumentoMedico = $_POST['FK_DocumentoMedico'];
    //Atributos CITA MEDICA

    $obj->TipoCita_CitaMedica = $_POST['TipoCita_CitaMedica'];
    $obj->Oidos_CitaMedica = $_POST['Oidos_CitaMedica'];
    $obj->FrecCardiaca_CitaMedica = $_POST['FrecCardiaca_CitaMedica'];
    $obj->Auscultacion_CitaMedica = $_POST['Auscultacion_CitaMedica'];
    $obj->FrecRespiratoria_CitaMedica = $_POST['FrecRespiratoria_CitaMedica'];
    $obj->Ojos_CitaMedica = $_POST['Ojos_CitaMedica'];
    $obj->Mucosas_CitaMedica = $_POST['Mucosas_CitaMedica'];
    $obj->Peso_CitaMedica = $_POST['Peso_CitaMedica'];
    $obj->Tilc_CitaMedica = $_POST['Tilc_CitaMedica'];
    $obj->Ganglios_CitaMedica = $_POST['Ganglios_CitaMedica'];
    $obj->Palpitacion_CitaMedica = $_POST['Palpitacion_CitaMedica'];
    $obj->CavidadOral_CitaMedica = $_POST['CavidadOral_CitaMedica'];
    $obj->Nervioso_CitaMedica = $_POST['Nervioso_CitaMedica'];
    $obj->Temperatura_CitaMedica = $_POST['Temperatura_CitaMedica'];
    $obj->Tegumento_CitaMedica = $_POST['Tegumento_CitaMedica'];
    $obj->Observacion_CitaMedica = $_POST['Observacion_CitaMedica'];
}
if (isset($_POST['consulta'])) {
    $obj->Codigo_CitaMedica = $_POST['Codigo_CitaMedica'];
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $query = "SELECT * from cita_medica where Codigo_CitaMedica ='$obj->Codigo_CitaMedica'";
    $resultado = mysqli_query($conecta, $query);
        if(mysqli_fetch_array($resultado)){
            echo "<script> alert('La CITA MEDICA fue encontrada en el Sistema Ingrese los datos')</script>";}
        else{
            echo '<script>alert("La CITA MEDICA no ha sido CREADA TODAVIA debe crearla")</script>';
        }
    $arreglo = mysqli_fetch_row($resultado);
    
    $obj->Codigo_CitaMedica = $arreglo[0];
    $obj->TipoCita_CitaMedica = $arreglo[2];
    $obj->Oidos_CitaMedica = $arreglo[3];
    $obj->FrecCardiaca_CitaMedica = $arreglo[4];
    $obj->Auscultacion_CitaMedica = $arreglo[5];
    $obj->FrecRespiratoria_CitaMedica = $arreglo[6];
    $obj->Ojos_CitaMedica = $arreglo[7];
    $obj->Mucosas_CitaMedica = $arreglo[8];
    $obj->Peso_CitaMedica = $arreglo[9];
    $obj->Tilc_CitaMedica = $arreglo[10];
    $obj->Ganglios_CitaMedica = $arreglo[11];
    $obj->Palpitacion_CitaMedica = $arreglo[12];
    $obj->CavidadOral_CitaMedica = $arreglo[13];
    $obj->Nervioso_CitaMedica = $arreglo[14];
    $obj->Temperatura_CitaMedica = $arreglo[15];
    $obj->Tegumento_CitaMedica = $arreglo[16];
    $obj->Observacion_CitaMedica = $arreglo[17];
} else {

    $obj->Codigo_CitaMedica = "";
    $obj->Codigo_CitaMedica = "";
    $obj->TipoCita_CitaMedica = "";
    $obj->Oidos_CitaMedica = "";
    $obj->FrecCardiaca_CitaMedica = "";
    $obj->Auscultacion_CitaMedica = "";
    $obj->FrecRespiratoria_CitaMedica = "";
    $obj->Ojos_CitaMedica = "";
    $obj->Mucosas_CitaMedica = "";
    $obj->Peso_CitaMedica = "";
    $obj->Tilc_CitaMedica =  "";
    $obj->Ganglios_CitaMedica =  "";
    $obj->Palpitacion_CitaMedica =  "";
    $obj->CavidadOral_CitaMedica =  "";
    $obj->Nervioso_CitaMedica =  "";
    $obj->Temperatura_CitaMedica =  "";
    $obj->Tegumento_CitaMedica = "";
    $obj->Observacion_CitaMedica = "";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Cita medica</title>
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

        <!-- Contenedor de crear o buscar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Citas medicas</h1>
                <ul class="breadcrumb breadcrumb-tabs">
                    <li>
                        <a href="citas_medicas.php" class="btn btn-info">
                            <i class="zmdi zmdi-plus"></i> &nbsp; CREAR CITA MEDICA
                        </a>
                    </li>
                    <li>
                        <a href="citas_medicas-buscar.php" class="btn btn-success">
                            <i class="zmdi zmdi-search">
                            </i> &nbsp; BUSCAR CITA MEDICA
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Formulario de cita medica -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL LAS CITAS MEDICAS</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" id="cita_medica">
                        <div class="panel-heading">
                            <legend><i class="zmdi zmdi-"></i>
                                <h4 style="text-align: center;">Buscar Cita medica</h4>
                            </legend>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    <div class="form-group label-floating">
                                        <span class="control-label">Ingrese codigo cita medica</span>
                                        <input class="form-control" type="text" name="Codigo_CitaMedica"
                                            id="Codigo_CitaMedica" value="<?php echo $obj->Codigo_CitaMedica; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <p class="text-center">
                                        <button type="submit" name="consulta" id="consulta"
                                            class="btn btn-primary btn-raised btn-sm">
                                            <i class="zmdi zmdi-search"></i> &nbsp; Buscar
                                        </button>
                                    </p>
                                </div>
                            </div>
                            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                            <fieldset>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo de cita</label>
                                                <input class="form-control" type="text" id="TipoCita_CitaMedica"
                                                    name="TipoCita_CitaMedica"
                                                    value="<?php echo $obj->TipoCita_CitaMedica ?>" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Oidos</label>
                                                <input class="form-control" type="text" id="Oidos_CitaMedica"
                                                    name="Oidos_CitaMedica" value="<?php echo $obj->Oidos_CitaMedica ?>"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Frecuencia Cardia</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->FrecCardiaca_CitaMedica ?>"
                                                    name="FrecCardiaca_CitaMedica" id="FrecCardiaca_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Auscultacion</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Auscultacion_CitaMedica ?>"
                                                    name="Auscultacion_CitaMedica" id="Auscultacion_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Frecuencia Respiratoria</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->FrecRespiratoria_CitaMedica ?>"
                                                    name="FrecRespiratoria_CitaMedica" id="FrecRespiratoria_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ojos</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Ojos_CitaMedica ?>"
                                                    name="Ojos_CitaMedica" id="Ojos_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Mucosas</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Mucosas_CitaMedica ?>"
                                                    name="Mucosas_CitaMedica" id="Mucosas_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Peso</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Peso_CitaMedica ?>"
                                                    name="Peso_CitaMedica" id="Peso_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tilc</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Tilc_CitaMedica ?>"
                                                    name="Tilc_CitaMedica" id="Tilc_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Ganglios</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Ganglios_CitaMedica ?>"
                                                    name="Ganglios_CitaMedica" id="Ganglios_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Palpitacion</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Palpitacion_CitaMedica ?>"
                                                    name="Palpitacion_CitaMedica" id="Palpitacion_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Cavidad Oral</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->CavidadOral_CitaMedica ?>"
                                                    name="CavidadOral_CitaMedica" id="CavidadOral_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nervioso</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Nervioso_CitaMedica ?>"
                                                    name="Nervioso_CitaMedica" id="Nervioso_CitaMedica" maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Temperatura</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Temperatura_CitaMedica ?>"
                                                    name="Temperatura_CitaMedica" id="Temperatura_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tegumento</label>
                                                <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                    type="text" value="<?php echo $obj->Tegumento_CitaMedica ?>"
                                                    name="Tegumento_CitaMedica" id="Tegumento_CitaMedica"
                                                    maxlength="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group label-floating">
                                                <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Observaciones
                                                </legend>
                                                <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text"
                                                    value="<?php echo $obj->Observacion_CitaMedica ?>"
                                                    name="Observacion_CitaMedica" id="Observacion_CitaMedica"
                                                    maxlength="40" rows="7" cols="60" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <p class="text-center" style="margin-top: 20px;">
                                <button type="submit" name="agregar" id="agregar"
                                    class="btn btn-info btn-raised btn-m"><i class="zmdi zmdi-plus"></i> Crear Historia
                                    Clinica</button>
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