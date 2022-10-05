<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaHospitalizacion.php";

    $obj = new HistoriaClinica_Hospitalizacion;

    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];

        $obj->agregar_HistoriaClinicaHospitalizacion();

    }
    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST['FK_CodigoHistoriaClinica'];
        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];

        $obj->eliminar_HistoriaClinicaHospitalizacion();
    }
?>