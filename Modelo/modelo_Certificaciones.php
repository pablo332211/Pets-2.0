<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Certificaciones.php";


$obj = new certificaciones();

if ($_POST) {
$obj->Tipo_Certificacion = $_POST['Tipo_Certificacion'];
$obj->Fecha_Certificacion = $_POST['Fecha_Certificacion'];
$obj->EntidadSolicitadora_Certificacion = $_POST['EntidadSolicitadora_Certificacion'];
$obj->Observacion_Certificacion = $_POST['Observacion_Certificacion'];
}

if (isset($_POST['agregar'])) {
    $obj->FK_DocumentoPropietario = $_POST['Documento_Propietario'];
    $obj->agregar_Certificacion();
}

if(isset($_POST['modificar'])){
    $obj->Codigo_Certificacion = $_POST['Codigo_Certificacion'];
    $obj->modificarCertificacion();
}

if (isset($_POST['eliminar'])) {
    $obj->Codigo_Certificacion = $_POST['Codigo_Certificacion'];
    $obj->eliminarCertificacion();
}













?>