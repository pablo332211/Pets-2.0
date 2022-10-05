<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_ProfilacticoMascota.php";


//--------------------- MODELO USUARIO PARA AGREGAR USUARIO-------------------------------
    $obj = new ProfilacticoMascota();

    if(isset($_POST['agregar'])){
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];

        $obj->agregarProfilacticoMascota();
    }
    if(isset($_POST['modificar'])){
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];
        $obj->modificarProfilacticoMascota();
        
    }
    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoProfilactico = $_POST['FK_CodigoProfilactico'];
        $obj->FK_CodigoMascota = $_POST['FK_CodigoMascota'];
        $obj->Fecha_ProfilacticoMascota= $_POST['Fecha_ProfilacticoMascota'];
        $obj->Dosis_ProfilacticoMascota= $_POST['Dosis_ProfilacticoMascota'];
        $obj->Administracion_ProfilacticoMascota= $_POST['Administracion_ProfilacticoMascota'];
        $obj->Observacion_ProfilacticoMascota= $_POST['Observacion_ProfilacticoMascota'];
        $obj->eliminarProfilacticoMascota();
    }
?>