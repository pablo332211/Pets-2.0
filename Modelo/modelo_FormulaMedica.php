<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_FormulaMedica.php";

    $obj = new Formula_Medica();

    if(isset($_POST['agregar'])){
        $obj->agregarFormulaMedica();
    }
    
    if(isset($_POST['modificar'])){
        $obj->Codigo_FormulaMedica = $_POST['Codigo_FormulaMedica'];
        $obj->Fecha_FormulaMedica = $_POST['Fecha_FormulaMedica'];
        $obj->modifcarFormulaMedica();
    }
    
    if(isset($_POST['eliminar'])){
        $obj->Codigo_FormulaMedica = $_POST['Codigo_FormulaMedica'];
        $obj->eliminarFormulaMedica();
    }