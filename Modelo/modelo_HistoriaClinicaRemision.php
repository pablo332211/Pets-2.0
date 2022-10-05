<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaRemision.php";

    $obj = new HistoriaClinica_Remision();
    
    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->agregar_HistoriaClinicaRemision();
    }

    if(isset($_POST['eliminar'])){
      //  $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->FK_CodigoRemision = $_POST["FK_CodigoRemision"];

        $obj->eliminar_HistoriaClinicaRemision();
    }
?>