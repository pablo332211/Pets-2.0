<?php 
    include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Medico.php";


//--------------------- MODELO USUARIO PARA AGREGAR USUARIO-------------------------------
    $obj = new Medico();

    //------------------ AGREGAR_USUARIO ------------------------//
    if($_POST){
        $obj->Documento_Medico = $_POST['Documento_Medico'];
        $obj->NombreA_Medico = $_POST['NombreA_Medico'];
        $obj->NombreB_Medico = $_POST['NombreB_Medico'];
        $obj->ApellidoA_Medico = $_POST['ApellidoA_Medico'];
        $obj->ApellidoB_Medico = $_POST['ApellidoB_Medico'];
        $obj->Correo_Medico = $_POST['Correo_Medico'];
        $obj->Telefono_Medico = $_POST['Telefono_Medico'];
        $obj->Celular_Medico = $_POST['Celular_Medico'];
    }

    if(isset($_POST['agregar'])){

        $obj->agregarMedico();
    }
    if(isset($_POST['modificar'])){

        $obj->modifcarMedico();
        
    }
    if(isset($_POST['eliminar'])){
        $obj->eliminarMedico();
    }
?>
