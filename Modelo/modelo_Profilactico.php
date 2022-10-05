<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Profilactico.php";

    $obj = new Profilactico();

    if(isset($_POST['consulta'])){

        $obj->Nombre_Profilactico = $_POST['Nombre_Profilactico'];
        $obj->Presentacion_Profilactico = $_POST['Presentacion_Profilactico'];
        
        $obj->consulta_Profilactico();
    }
?>