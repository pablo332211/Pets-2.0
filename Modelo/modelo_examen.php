<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/Controlador/controlador_examen.php";

    $obj = new examen();

    if(isset($_POST['agregar'])){
        $obj->Fecha_Examen = $_POST['Fecha_Examen'];
        $obj->Tipo_Examen = $_POST['Tipo_Examen'];
        $obj->Correo_Examen = $_POST['Correo_Examen'];
        $obj->Resultado_Examen = $_POST['Resultado_Examen'];
        $obj->Observacion_Examen = $_POST['Observacion_Examen'];

        $obj->agregar_Examen();
    }
    
    if(isset($_POST['modificar'])){
        $obj->Codigo_Examen = $_POST['Codigo_Examen'];
        $obj->Fecha_Examen = $_POST['Fecha_Examen'];
        $obj->Tipo_Examen = $_POST['Tipo_Examen'];
        $obj->Correo_Examen = $_POST['Correo_Examen'];
        $obj->Resultado_Examen = $_POST['Resultado_Examen'];
        $obj->Observacion_Examen = $_POST['Observacion_Examen'];

        $obj->modifcar_Examen();
    }
    
    if(isset($_POST['eliminar'])){
        $obj->Codigo_Examen = $_POST['Codigo_Examen'];
        $obj->Fecha_Examen = $_POST['Fecha_Examen'];
        $obj->Tipo_Examen = $_POST['Tipo_Examen'];
        $obj->Correo_Examen = $_POST['Correo_Examen'];
        $obj->Resultado_Examen = $_POST['Resultado_Examen'];
        $obj->Observacion_Examen = $_POST['Observacion_Examen'];
        
        $obj->eliminar_Examen();
    }
?>