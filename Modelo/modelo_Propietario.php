<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Propietario.php";


//--------------------- MODELO USUARIO PARA AGREGAR USUARIO-------------------------------
    $obj = new Propietario();

    //------------------ AGREGAR_USUARIO ------------------------//
    if($_POST){
        $obj->Documento_Propietario = $_POST['Documento_Propietario'];
        $obj->NombreA_Propietario = $_POST['NombreA_Propietario'];
        $obj->NombreB_Propietario = $_POST['NombreB_Propietario'];
        $obj->ApellidoA_Propietario = $_POST['ApellidoA_Propietario'];
        $obj->ApellidoB_Propietario = $_POST['ApellidoB_Propietario'];
        $obj->Direccion_Propietario = $_POST['Direccion_Propietario'];
        $obj->Telefono_Propietario = $_POST['Telefono_Propietario'];
        $obj->Celular_Propietario = $_POST['Celular_Propietario'];
        $obj->Correo_Propietario = $_POST['Correo_Propietario'];
        
    }

    if(isset($_POST['agregar'])){

        $obj->agregarUsuario();
    }
    if(isset($_POST['modificar'])){

        $obj->modifcarUsuario();
        
    }
    if(isset($_POST['eliminar'])){
        $obj->eliminarUsuario();
    }
?>
