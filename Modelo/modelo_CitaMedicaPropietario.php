<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_CitaMedicaPropietario.php";

$obj = new CitaMedica_Propietario();

if($_POST){
    //Llave foranea Medico
    $obj->FK_DocumentoPropietario =$_POST['FK_DocumentoPropietario'];
    //Atributos CITA MEDICA
    $obj->FK_CodigoCitaMedica=$_POST['FK_CodigoCitaMedica'];
    $obj->Fecha_CitaMedica= $_POST['Fecha_CitaMedica'];
    $obj->Observacion_CitaMedica= $_POST['Observacion_CitaMedica'];
}

if(isset($_POST['agregar'])){
    $obj->agregar_CitaMedicaPropietario();
}

if (isset($_POST['modificar'])) {
    $obj->modificar_CitaMedicaPropietario();
}

if (isset($_POST['eliminar'])) {
    $obj->elimiminar_CitaMedicaPropietario();
}
?>