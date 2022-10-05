<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaPruebaLaboratorio.php";

    $obj = new HistoriaClinica_PruebaLaboratorio();
    
    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->agregar_HistoriaClinicaPruebaLaboratorio();
    }

    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"];
        $obj->FK_CodigoPruebaLaboratorio = $_POST["FK_CodigoPruebaLaboratorio"];

        $obj->eliminar_HistoriaClinicaPruebaLaboratorio();
    }
?>