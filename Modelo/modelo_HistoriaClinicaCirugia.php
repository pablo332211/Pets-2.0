<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaCirugia.php";

$obj = new historiaClinica_Cirugia();

if (isset($_POST['agregar'])) {
    $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
    
    $obj->agregar_HistoriaClinicaCirugia();
}

if (isset($_POST['eliminar'])) {
    $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
    $obj->FK_CodigoCirugia = $_POST['Codigo_Cirugia'];
    $obj->eliminar_HistoriaClinicaCirugia();
}


?>