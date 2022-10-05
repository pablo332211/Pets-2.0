<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Remision.php";

    $obj = new Remision();

    if(isset($_POST['agregar'])){
        $obj->Fecha_Remision = $_POST['Fecha_Remision'];
        $obj->Especialista_Remision = $_POST['Especialista_Remision'];
        $obj->Celular_Remision = $_POST['Celular_Remision'];
        $obj->Entidad_Remision = $_POST['Entidad_Remision'];
        $obj->Observacion_Remision = $_POST['Observacion_Remision'];

        $obj->agregar_Remision();
    }

    if(isset($_POST['modificar'])){
        $obj->Codigo_Remision = $_POST['Codigo_Remision'];
        $obj->Fecha_Remision = $_POST['Fecha_Remision'];
        $obj->Especialista_Remision = $_POST['Especialista_Remision'];
        $obj->Celular_Remision = $_POST['Celular_Remision'];
        $obj->Entidad_Remision = $_POST['Entidad_Remision'];
        $obj->Observacion_Remision = $_POST['Observacion_Remision'];

        $obj->modificar_Remision();
    }

    if(isset($_POST['eliminar'])){
        $obj->Codigo_Remision = $_POST['Codigo_Remision'];
        $obj->Fecha_Remision = $_POST['Fecha_Remision'];
        $obj->Especialista_Remision = $_POST['Especialista_Remision'];
        $obj->Celular_Remision = $_POST['Celular_Remision'];
        $obj->Entidad_Remision = $_POST['Entidad_Remision'];
        $obj->Observacion_Remision = $_POST['Observacion_Remision'];

        $obj->eliminar_Remision();
    }
?>