<?php
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HospitalizacionBitacora.php";

    $obj = new Hospitalizacion_Bitacora;

    if(isset($_POST['agregar'])){
        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];

        $obj->agregar_HospitalizacionBitacora();

    }
    if(isset($_POST['eliminar'])){
        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];

        $obj->eliminar_HospitalizacionBitacoras();
    }
    if(isset($_POST['eliminarBit'])){
        $obj->FK_CodigoHospitalizacion = $_POST['FK_CodigoHospitalizacion'];
        $obj->FK_CodigoBitacora = $_POST['FK_CodigoBitacora'];
        $obj->eliminar_HospitalizacionBitacora();
    }
?>