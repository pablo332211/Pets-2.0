<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_CitaMedica.php";
//--------------------- MODELO HISTORIA CLINICA-------------------------------
$obj = new cita_medica();

//-------------------------- AGREGAR CITA MEDICA -----------------------------------//
    //Llave foranea Medico
if(isset($_POST['agregar'])){

    $obj->Codigo_CitaMedica=$_POST['Codigo_CitaMedica'];

    $obj->agregar_CitaMedica();
}

//-------------------------- MODIFICAR CITA MEDICA -----------------------------------//
if(isset($_POST['modificar'])){
    $obj->Codigo_CitaMedica=$_POST['Codigo_CitaMedica'];

    $obj->TipoCita_CitaMedica=$_POST['TipoCita_CitaMedica'];
    $obj->Oidos_CitaMedica = $_POST['Oidos_CitaMedica'];
    $obj->FrecCardiaca_CitaMedica=$_POST['FrecCardiaca_CitaMedica'];
    $obj->Ojos_CitaMedica=$_POST['Ojos_CitaMedica'];
    $obj->Auscultacion_CitaMedica=$_POST['Auscultacion_CitaMedica'];
    $obj->FrecRespiratoria_CitaMedica=$_POST['FrecRespiratoria_CitaMedica'];
    $obj->Mucosas_CitaMedica=$_POST['Mucosas_CitaMedica'];
    $obj->Peso_CitaMedica=$_POST['Peso_CitaMedica'];
    $obj->Tilc_CitaMedica=$_POST['Tilc_CitaMedica'];
    $obj->Ganglios_CitaMedica=$_POST['Ganglios_CitaMedica'];
    $obj->Palpitacion_CitaMedica=$_POST['Palpitacion_CitaMedica'];
    $obj->CavidadOral_CitaMedica=$_POST['CavidadOral_CitaMedica'];
    $obj->Nervioso_CitaMedica=$_POST['Nervioso_CitaMedica'];
    $obj->Temperatura_CitaMedica=$_POST['Temperatura_CitaMedica'];
    $obj->Tegumento_CitaMedica=$_POST['Tegumento_CitaMedica'];
    $obj->Observacion_CitaMedica=$_POST['Observacion_CitaMedica'];

    $obj->modificar_CitaMedica();
}


//-------------------------- ELIMINAR CITA MEDICA -----------------------------------//
if(isset($_POST['eliminar'])){
    $obj->Codigo_CitaMedica = $_POST['FK_CodigoCitaMedica'];
    $obj->eliminar_CitaMedica();
}

?>