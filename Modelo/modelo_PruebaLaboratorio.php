<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_PruebaLaboratorio.php";

    $obj = new Prueba_Laboratorio();

    if(isset($_POST['agregar'])){
        $obj->Nombre_PruebaLaboratorio = $_POST['Nombre_PruebaLaboratorio'];
        $obj->Tipo_PruebaLaboratorio = $_POST['Tipo_PruebaLaboratorio'];
        $obj->Fecha_PruebaLaboratorio = $_POST['Fecha_PruebaLaboratorio'];
        $obj->Laboratorio_PruebaLaboratorio = $_POST['Laboratorio_PruebaLaboratorio'];
        $obj->Resultado_PruebaLaboratorio = $_POST['Resultado_PruebaLaboratorio'];

        $obj->agregar_PruebaLaboratorio();
    }

    if(isset($_POST['modificar'])){
        $obj->Codigo_PruebaLaboratorio = $_POST['Codigo_PruebaLaboratorio'];
        $obj->Nombre_PruebaLaboratorio = $_POST['Nombre_PruebaLaboratorio'];
        $obj->Tipo_PruebaLaboratorio = $_POST['Tipo_PruebaLaboratorio'];
        $obj->Fecha_PruebaLaboratorio = $_POST['Fecha_PruebaLaboratorio'];
        $obj->Laboratorio_PruebaLaboratorio = $_POST['Laboratorio_PruebaLaboratorio'];
        $obj->Resultado_PruebaLaboratorio = $_POST['Resultado_PruebaLaboratorio'];

        $obj->modifcar_PruebaLaboratorio();
    }

    if(isset($_POST['eliminar'])){
        $obj->Codigo_PruebaLaboratorio = $_POST['Codigo_PruebaLaboratorio'];
        $obj->Nombre_PruebaLaboratorio = $_POST['Nombre_PruebaLaboratorio'];
        $obj->Tipo_PruebaLaboratorio = $_POST['Tipo_PruebaLaboratorio'];
        $obj->Fecha_PruebaLaboratorio = $_POST['Fecha_PruebaLaboratorio'];
        $obj->Laboratorio_PruebaLaboratorio = $_POST['Laboratorio_PruebaLaboratorio'];
        $obj->Resultado_PruebaLaboratorio = $_POST['Resultado_PruebaLaboratorio'];

        $obj->eliminar_PruebaLaboratorio();
    }
?>