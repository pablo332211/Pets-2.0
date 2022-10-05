<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Mascota.php";


//--------------------- MODELO USUARIO PARA AGREGAR USUARIO-------------------------------
    $obj = new Mascota();

    //------------------ AGREGAR_USUARIO ------------------------//
    if($_POST){
        //Atributos Mascota
    }

    if(isset($_POST['agregar'])){
        $obj->FK_DocumentoPropietario = $_POST['Documento_Propietario'];

        $obj->Nombre_Mascota = $_POST['Nombre_Mascota'];
        $obj->Edad_Mascota = $_POST['Edad_Mascota'];
        $obj->FK_EspecieMascota = $_POST['FK_EspecieMascota'];
        $obj->Color_Mascota = $_POST['Color_Mascota'];
        $obj->FK_GeneroMascota = $_POST['FK_GeneroMascota'];
        $obj->Observacion_Mascota = $_POST['Observacion_Mascota'];
        $obj->agregarMascota();
    }

    if(isset($_POST['modificar'])){
        $obj->Codigo_Mascota = $_POST['Codigo_Mascota'];
        $obj->FK_DocumentoPropietario = $_POST['Documento_Propietario'];

        $obj->Nombre_Mascota = $_POST['Nombre_Mascota'];
        $obj->Edad_Mascota = $_POST['Edad_Mascota'];
        $obj->FK_EspecieMascota = $_POST['FK_EspecieMascota'];
        $obj->Color_Mascota = $_POST['Color_Mascota'];
        $obj->FK_GeneroMascota = $_POST['FK_GeneroMascota'];
        $obj->Observacion_Mascota = $_POST['Observacion_Mascota'];
        $obj->modifcarMascota();
    }

    if(isset($_POST['eliminar'])){
        $obj->Codigo_Mascota = $_POST['Codigo_Mascota'];
        $obj->eliminarMascota(); 
    }
?>