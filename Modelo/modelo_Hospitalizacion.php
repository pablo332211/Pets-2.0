<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Hospitalizacion.php";

    $obj = new Hospitalizacion;

    if(isset($_POST['agregar'])){
        $obj->FechaIngreso_Hospitalizacion = $_POST['FechaIngreso_Hospitalizacion'];
        $obj->FechaSalida_Hospitalizacion = $_POST['FechaSalida_Hospitalizacion'];

        $obj->agregar_Hospitalizacion();

    }
    if(isset($_POST['modificar'])){
        $obj->Codigo_Hospitalizacion = $_POST['Codigo_Hospitalizacion'];
        $obj->FechaIngreso_Hospitalizacion = $_POST['FechaIngreso_Hospitalizacion'];
        $obj->FechaSalida_Hospitalizacion = $_POST['FechaSalida_Hospitalizacion'];

        $obj->modificar_Hospitalizacion();

    }
    if(isset($_POST['eliminar'])){
        $obj->Codigo_Hospitalizacion = $_POST['Codigo_Hospitalizacion'];

        $obj->eliminar_Hospitalizacion();

    }

    
?>