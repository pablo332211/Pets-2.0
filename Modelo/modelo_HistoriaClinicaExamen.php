<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaExamen.php";

    $obj = new HistoriaClinica_Examen();
    
    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->agregar_HistoriaClinicaExamen();
    }

    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->FK_CodigoExamen = $_POST["FK_CodigoExamen"];
        $obj->eliminar_HistoriaClinicaExamen();
    }

?>