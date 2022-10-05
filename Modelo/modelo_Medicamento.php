<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Medicamento.php";

    $obj = new Medicamento();
    
    if(isset($_POST['consulta'])){
        $obj->Nombre_Medicamento = $_POST["Nombre_Medicamento"] ;
        $obj->Tipo_Medicamento = $_POST["Tipo_Medicamento"] ;
        $obj->Concentracion_Medicamento = $_POST["Concentracion_Medicamento"];
        $obj->Codigo_Medicamento = $_POST["Codigo_Medicamento"];
        $obj->FK_CodigoPresentacion = $_POST["FK_CodigoPresentacion"];
        
        $obj->consultaMedicamento();
    }

?>