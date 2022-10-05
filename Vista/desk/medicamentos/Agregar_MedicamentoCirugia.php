<?php
    include "../../../Conexion/conexion.php";
    include "../../../Modelo/modelo_Medicamento.php";
    include "../../../Modelo/modelo_MedicamentoCirugia.php";    
?>

<?php
$DocM=$_GET['DocM'];
$CodC = $_GET['CodC'];
$llave = $_GET['key'];

    $clas= new Conexion;
    $conecta= $clas->conectarServidor();
    $query ="SELECT Codigo_HistoriaClinica, FK_CodigoMascota, Nombre_Mascota FROM historia_clinica,mascota WHERE Codigo_HistoriaClinica= '$llave' AND FK_CodigoMascota=Codigo_Mascota";
    $resultado = mysqli_query($conecta,$query);
    $arregloHC = mysqli_fetch_row($resultado);
    $obj->Codigo_HistoriaClinica = $arregloHC[0];
    $obj->FK_CodigoMascota = $arregloHC[1];
    $obj->Nombre_Mascota =$arregloHC[2];

    if(isset($_POST['consulta'])){
        $obj = new Medicamento;

        $obj->Nombre_Medicamento = $_POST["Nombre_Medicamento"] ;
        $obj->Tipo_Medicamento = $_POST["Tipo_Medicamento"] ;
        $obj->Concentracion_Medicamento = $_POST["Concentracion_Medicamento"];
        $obj->Codigo_Medicamento = $_POST["Codigo_Medicamento"];
        $obj->Presentacion_Medicamento = $_POST["Presentacion_Medicamento"];
        
        
        $query = "SELECT * FROM  medicamento WHERE Nombre_Medicamento = '$obj->Nombre_Medicamento' AND Presentacion_Medicamento = '$obj->Presentacion_Medicamento'";
        echo $query;
        $resultado = mysqli_query($conecta, $query);
        $arreglo = mysqli_fetch_row($resultado);

        $obj->Codigo_Medicamento = $arreglo[0];
        $obj->Nombre_Medicamento = $arreglo[1];
        $obj->Tipo_Medicamento = $arreglo[2];
        $obj->Concentracion_Medicamento = $arreglo[3];
        $obj->Presentacion_Medicamento = $arreglo[4];
    }
    else{
        $obj->Codigo_Medicamento = "";
        $obj->Nombre_Medicamento = "" ;
        $obj->Tipo_Medicamento = "" ;
        $obj->Concentracion_Medicamento = "";
        $obj->Presentacion_Medicamento = "";
    }

    if(isset($_POST['agregar'])){
        
        $obj = new medicamento_Cirugia;

        $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
        $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];
        $obj->Dosis_MedicamentoCirugia = $_POST['Dosis_MedicamentoCirugia'];
        $obj->Administracion_MedicamentoCirugia = $_POST['Administracion_MedicamentoCirugia'];
        $obj->Observacion_MedicamentoCirugia = $_POST['Observacion_MedicamentoCirugia'];
        
        $obj->Codigo_Medicamento = "";
        $obj->Nombre_Medicamento = "" ;
        $obj->Tipo_Medicamento = "" ;
        $obj->Concentracion_Medicamento = "";
        $obj->Presentacion_Medicamento = "";  
    }
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
                            <a href="../../desk_full.php?key=<?php echo urldecode($arregloHC[0])?>&DocM<?php echo urldecode($DocM)?>" title="escritorio">
                                <i class="zmdi zmdi-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="../cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urldecode($arregloHC[0])?>&DocM=<?php echo urldecode($DocM)?>" title="Historias Clinicas">
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
                    <a href="../../search.php" class="btn-search">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content page -->
        <div class="container-fluid">
            <div class="page-header">
                <h1 class="text-titles">Medicamentos de <?php echo $arregloHC[2]; ?></h1>
                <ul class="breadcrumb breadcrumb-tabs">
                <li>
                        <a href="../Cirugias/Cirugias_HistoriaClinica.php?key=<?php echo urlencode($arregloHC[0])?>&CodC=<?php echo urlencode($CodC)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-search"></i> &nbsp; CIRUGIAS
                        </a>
                    </li>
                    <li>
                        <a href="../cirugias/Modificar_Cirugia.php?key=<?php echo urlencode($arregloHC[0])?>&CodC=<?php echo urlencode($CodC)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-edit"></i> &nbsp; MODIFICAR CIRUGIA
                        </a>
                    </li>
                    <li>
                        <a href="Listar_MedicamentoCirugia.php?key=<?php echo urlencode($arregloHC[0])?>&CodC=<?php echo urlencode($CodC)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-success">
                            <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA MEDICAMENTOS
                        </a>
                    </li>
                    <li>
                        <a href="Agregar_MedicamentoCirugia.php?key=<?php echo urlencode($arregloHC[0])?>&CodC=<?php echo urlencode($CodC)?>&DocM=<?php echo urldecode($DocM)?>" class="btn btn-info">
                            <i class="zmdi zmdi-plus">
                            </i> &nbsp; NUEVO MEDICAMENTO
                        </a>
                    </li>
                </ul>
            </div>
        </div>>

        <div class="container-fluid">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; Consultar Medicamento</h3>
                    </div>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Codigo Medicamento</label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,45}" required name="Codigo_Medicamento" id="Codigo_Medicamento" value="<?php echo$obj->Codigo_Medicamento?>" readOnly size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombre Medicamento</label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Nombre_Medicamento" id="Nombre_Medicamento" value="<?php echo$obj->Nombre_Medicamento?>" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Presentacion Medicamento</label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Presentacion_Medicamento" id="Presentacion_Medicamento" value="<?php echo $obj->Presentacion_Medicamento?>" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Tipo Medicamento </label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Tipo_Medicamento" id="Tipo_Medicamento" value="<?php echo $obj->Tipo_Medicamento?>" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Concentracion Medicamento </label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ_ ]{1,45}" required name="Concentracion_Medicamento" id="Concentracion_Medicamento" value="<?php echo $obj->Concentracion_Medicamento?>" size="40">
                                            </div>
                                        </div>
                                            <td><button class="btn btn-info btn-raised btn-sm" name="consulta" type="submit">CONSULTAR</button></td> 
                                    </tr>
                                </table>
                                <hr size="2px" color="black" />
                            </div>
                        </div>
                    </form>
                    <form method="POST">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <tr>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Dosis Medicamento</label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,45}" required name="Dosis_MedicamentoCirugia" id="Dosis_MedicamentoCirugia"  size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Administracion Medicamento</label>
                                                <input class="form-control" type="text" maxlength="45" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,45}" required name="Administracion_MedicamentoCirugia" id="Administracion_MedicamentoCirugia" size="40">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Observacion Medicamento </label>
                                                <textarea class="form-control" type="text-area" maxlength="400" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,400}" required name="Observacion_MedicamentoCirugia" id="Observacion_MedicamentoCirugia"  rows="7" cols="60"></textarea>
                                            </div>
                                        </div>
                                            <input type="hidden" name="FK_CodigoCirugia" id="FK_CodigoCirugia" value="<?php echo $CodC; ?>" readOnly size="30">
                                            <input type="hidden" name="FK_CodigoMedicamento" id="FK_CodigoMedicamento" value="<?php echo $obj->Codigo_Medicamento;?>" readOnly size="30">
                                            <td><button class="btn btn-info btn-raised btn-sm" name="agregar" type="submit">Agregar Medicamento</button></td> 
                                    </tr>
                                </table>
                            </div>
                            <hr size="2px" color="black" />
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