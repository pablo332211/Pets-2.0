<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinicaFormulaMedica.php";

    $obj = new HistoriaClinica_FormulaMedica();
    
    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"] ;

        $obj->agregarHistoriaClinicaFormulaMedica();
    }

    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHistoriaClinica = $_POST["FK_CodigoHistoriaClinica"] ;
        $obj->FK_CodigoFormulaMedica = $_POST["FK_CodigoFormulaMedica"] ;
        $obj->eliminarHistoriaClinicaFormulaMedica();
    }

?>