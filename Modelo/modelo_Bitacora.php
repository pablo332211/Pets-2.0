<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Bitacora.php";
   

    $obj = new Bitacora;

    if(isset($_POST['agregar'])){
        $obj->FechaActual_Bitacora = $_POST['FechaActual_Bitacora'];
        $obj->FormMedTratada_Bitacora = $_POST['FormMedTratada_Bitacora'];
        $obj->Temperatura_Bitacora = $_POST['Temperatura_Bitacora'];
        $obj->FrecCardiaca_Bitacora = $_POST['FrecCardiaca_Bitacora'];
        $obj->FrecRespiratoria_Bitacora = $_POST['FrecRespiratoria_Bitacora'];
        $obj->ColorMucosa_Bitacora = $_POST['ColorMucosa_Bitacora'];
        $obj->Apetito_Bitacora = $_POST['Apetito_Bitacora'];
        $obj->Sed_Bitacora = $_POST['Sed_Bitacora'];
        $obj->EstadoAnimo_Bitacora = $_POST['EstadoAnimo_Bitacora'];
        $obj->Vomito_Bitacora = $_POST['Vomito_Bitacora'];
        $obj->Orina_Bitacora = $_POST['Orina_Bitacora'];
        $obj->GradoHidratacion_Bitacora = $_POST['GradoHidratacion_Bitacora'];
        $obj->Observacion_Bitacora = $_POST['Observacion_Bitacora'];

        $obj->agregar_Bitacora();

    }
    if(isset($_POST['modificar'])){
        $obj->Codigo_Bitacora = $_POST['Codigo_Bitacora'];
        $obj->FechaActual_Bitacora = $_POST['FechaActual_Bitacora'];
        $obj->FormMedTratada_Bitacora = $_POST['FormMedTratada_Bitacora'];
        $obj->Temperatura_Bitacora = $_POST['Temperatura_Bitacora'];
        $obj->FrecCardiaca_Bitacora = $_POST['FrecCardiaca_Bitacora'];
        $obj->FrecRespiratoria_Bitacora = $_POST['FrecRespiratoria_Bitacora'];
        $obj->ColorMucosa_Bitacora = $_POST['ColorMucosa_Bitacora'];
        $obj->Apetito_Bitacora = $_POST['Apetito_Bitacora'];
        $obj->Sed_Bitacora = $_POST['Sed_Bitacora'];
        $obj->EstadoAnimo_Bitacora = $_POST['EstadoAnimo_Bitacora'];
        $obj->Vomito_Bitacora = $_POST['Vomito_Bitacora'];
        $obj->Orina_Bitacora = $_POST['Orina_Bitacora'];
        $obj->GradoHidratacion_Bitacora = $_POST['GradoHidratacion_Bitacora'];
        $obj->Observacion_Bitacora = $_POST['Observacion_Bitacora'];

        $obj->modificar_Bitacora();

    }
  

    if(isset($_POST['eliminarBit'])){
        $obj->Codigo_Bitacora = $_POST['Codigo_Bitacora'];
        $obj->eliminar_Bitacora();
    }
if(isset($_POST['eliminar'])){
        //$obj->Codigo_Bitacora = $_POST['Codigo_Bitacora'];
        $obj->eliminar_Bitacoras();
    }

    
?>