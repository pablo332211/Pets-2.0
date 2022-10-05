<?php
include "../../../Conexion/conexion.php";
include "../../../Modelo/modelo_CitaMedica.php";

$CodHC = $_GET['CodHC'];
$CodCM = $_GET['CodCM'];
$DocM = $_GET['DocM'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$CodHC' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

    $obj = new cita_medica();

    //datos tomados en la historia clinica
    if ($_POST) {
    //Llave foranea Medico
    $obj->FK_DocumentoMedico = $_POST['FK_DocumentoMedico'];
    //Atributos CITA MEDICA
    $obj->Codigo_CitaMedica = $_POST['Codigo_CitaMedica'];
    $obj->TipoCita_CitaMedica = $_POST['TipoCita_CitaMedica'];
    $obj->Oidos_CitaMedica = $_POST['Oidos_CitaMedica'];
    $obj->FrecCardiaca_CitaMedica = $_POST['FrecCardiaca_CitaMedica'];
    $obj->Ojos_CitaMedica = $_POST['Ojos_CitaMedica'];
    $obj->Auscultacion_CitaMedica = $_POST['Auscultacion_CitaMedica'];
    $obj->FrecRespiratoria_CitaMedica = $_POST['FrecRespiratoria_CitaMedica'];
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

    $query = "SELECT * FROM cita_medica where Codigo_CitaMedica ='$CodCM'";
    $resultado = mysqli_query($conecta, $query);
    $arreglo = mysqli_fetch_row($resultado);


    $obj->Codigo_CitaMedica = $arreglo[0];
    $obj->FK_DocumentoMedico = $arreglo[1];
    $obj->TipoCita_CitaMedica = $arreglo[2];
    $obj->Oidos_CitaMedica = $arreglo[3];
    $obj->FrecCardiaca_CitaMedica = $arreglo[4];
    $obj->Ojos_CitaMedica = $arreglo[5];
    $obj->Auscultacion_CitaMedica = $arreglo[6];
    $obj->FrecRespiratoria_CitaMedica = $arreglo[7];
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
                            <a href="../desk/cuenta/mi_cuenta.php?DocM=<?php echo urldecode($DocM)?>" title="Mi cuenta">
                                <i class="zmdi zmdi-account-circle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="ListarCitaMedica_HC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historia Clinica">
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
                                <a href="../citas_medicas/ListarCitaMedica_HC.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>">
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

        <!-- Contenedor de crear o buscar -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Modificar Citas medicas</h1>
            </div>
        </div>

        <!--cita medica -->
        <div class="container-fluid">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS CITA MEDICA</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" id="cita_medica">
                        <fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Codigo</label>
                                            <input class="form-control" type="number" id="Codigo_CitaMedica"
                                                name="Codigo_CitaMedica" value="<?php echo $obj->Codigo_CitaMedica; ?>"
                                                maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">DNI MEDICO</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" id="FK_DocumentoMedico" name="FK_DocumentoMedico"
                                                value="<?php echo $obj->FK_DocumentoMedico; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tipo de cita</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" id="TipoCita_CitaMedica" name="TipoCita_CitaMedica"
                                                value="<?php echo $obj->TipoCita_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Oidos</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" id="Oidos_CitaMedica" name="Oidos_CitaMedica"
                                                value="<?php echo $obj->Oidos_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Cardia</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="FrecCardiaca_CitaMedica" id="FrecCardiaca_CitaMedica"
                                                value="<?php echo $obj->FrecCardiaca_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ojos</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Ojos_CitaMedica" id="Ojos_CitaMedica"
                                                value="<?php echo $obj->Ojos_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Auscultacion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Auscultacion_CitaMedica" id="Auscultacion_CitaMedica"
                                                value="<?php echo $obj->Auscultacion_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Frecuencia Respiratoria</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="FrecRespiratoria_CitaMedica"
                                                id="FrecRespiratoria_CitaMedica"
                                                value="<?php echo $obj->FrecRespiratoria_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Mucosas</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Mucosas_CitaMedica" id="Mucosas_CitaMedica"
                                                value="<?php echo $obj->Mucosas_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Peso</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Peso_CitaMedica" id="Peso_CitaMedica"
                                                value="<?php echo $obj->Peso_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tilc</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Tilc_CitaMedica" id="Tilc_CitaMedica"
                                                value="<?php echo $obj->Tilc_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Ganglios</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Ganglios_CitaMedica" id="Ganglios_CitaMedica"
                                                value="<?php echo $obj->Ganglios_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Palpitacion</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Palpitacion_CitaMedica" id="Palpitacion_CitaMedica"
                                                value="<?php echo $obj->Palpitacion_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cavidad Oral</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="CavidadOral_CitaMedica" id="CavidadOral_CitaMedica"
                                                value="<?php echo $obj->CavidadOral_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nervioso</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Nervioso_CitaMedica" id="Nervioso_CitaMedica"
                                                value="<?php echo $obj->Nervioso_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Temperatura</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Temperatura_CitaMedica" id="Temperatura_CitaMedica"
                                                value="<?php echo $obj->Temperatura_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tegumento</label>
                                            <input pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" class="form-control"
                                                type="text" name="Tegumento_CitaMedica" id="Tegumento_CitaMedica"
                                                value="<?php echo $obj->Tegumento_CitaMedica; ?>" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group label-floating">
                                            <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Observaciones
                                            </legend>
                                            <textarea pattern="[a-zA-Z0-9áéíóúÁÉÍTipoÓÚñÑ ]{1,40}" type="text"
                                                value="<?php echo $obj->Observacion_CitaMedica ?>"
                                                name="Observacion_CitaMedica" id="Observacion_CitaMedica" maxlength="40"
                                                rows="7" cols="60" 
                                                required><?php echo $obj->Observacion_CitaMedica; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" name="modificar" id="modificar"class="btn btn-info btn-raised btn-sm">Modificar Historia Clinica</button>
                        </p>
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