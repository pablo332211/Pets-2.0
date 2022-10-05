<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_CitaMedicaMascota.php";

$obj = new citaMedica_Mascota();

if(isset($_POST['agregar'])){
    $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
    $obj->FK_CodigoCitaMedica= $_POST['FK_CodigoCitaMedica'];   
    $obj->agregar_CitaMedicaMascota();
}

if (isset($_POST['eliminar'])) {
    $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
    $obj->FK_CodigoCitaMedica= $_POST['FK_CodigoCitaMedica']; 
    $obj->eliminar_CitaMedicaMascota();
}
