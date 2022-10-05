<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_FormulaMedicaMedicamento.php";

    $obj = new formulamedica_medicamento();

    if(isset($_POST['agregar'])){
        $obj->FK_CodigoFormulaMedica = $_POST['FK_CodigoFormulaMedica'];
        $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
        $obj->Dosis_Medicamento = $_POST['Dosis_Medicamento'];
        $obj->FK_CodigoAdministracion = $_POST['FK_CodigoAdministracion'];
        $obj->Observacion_Medicamento = $_POST['Observacion_Medicamento'];

        $obj->agregar_FormulaMedicaMedicamento();
    }
 
    if(isset($_POST['modificar'])){
        $obj->FK_CodigoFormulaMedica = $_POST['FK_CodigoFormulaMedica'];
        $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
        $obj->Dosis_Medicamento = $_POST['Dosis_Medicamento'];
        $obj->FK_CodigoAdministracion = $_POST['FK_CodigoAdministracion'];
        $obj->Observacion_Medicamento = $_POST['Observacion_Medicamento']; 

        $obj->modificar_FormulaMedicaMedicamento();
    }

    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoFormulaMedica = $_POST['FK_CodigoFormulaMedica'];
        $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
        $obj->eliminar_FormulaMedicaMedicamento();
    }
?>
