<?php
 include("../../administrador/controladores/Controlador_Medico.php"); 


 

$obj = new medico();

if ($_POST){
    $obj->Documento_Medico = $_POST['Documento_Medico'];
    $obj->NombreA_Medico = $_POST['NombreA_Medico'];
    $obj->NombreB_Medico = $_POST['NombreB_Medico'];
    $obj->ApellidoA_Medico = $_POST['ApellidoA_Medico'];
    $obj->ApellidoB_Medico = $_POST['ApellidoB_Medico'];
    $obj->Correo_Medico = $_POST['Correo_Medico'];
    $obj->Telefono_Medico = $_POST['Telefono_Medico'];
    $obj->Celular_Medico = $_POST['Celular_Medico'];
    $obj->Contrasena_Medico = $_POST['Contrasena_Medico'];   
    
    



    
}
if (isset($_POST['agregarMedico'])){
    $obj->agregarMedico();
}
if (isset($_POST['modificarMedico'])){
    $obj->modifcarMedico();
}
if (isset($_POST['eliminarMedico'])){
    $obj->eliminarMedico();
}



?>