<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_Cirugia.php";

$obj = new cirugia();

if (isset($_POST['agregar'])) {
    $obj->Fecha_Cirugia = $_POST['Fecha_Cirugia'];
    $obj->NombrePaciente_Cirugia = $_POST['NombrePaciente_Cirugia'];
    $obj->Especie_Cirugia = $_POST['Especie_Cirugia'];
    $obj->Raza_Cirugia = $_POST['Raza_Cirugia'];
    $obj->Sexo_Cirugia = $_POST['Sexo_Cirugia'];
    $obj->Edad_Cirugia = $_POST['Edad_Cirugia']; 
    $obj->Peso_Cirugia = $_POST['Peso_Cirugia']; 
    $obj->TipoProcedimiento_Cirugia = $_POST['TipoProcedimiento_Cirugia']; 
    $obj->TipoAnestecia_Cirugia = $_POST['TipoAnestecia_Cirugia']; 
    $obj->NombrePropietario_Cirugia = $_POST['NombrePropietario_Cirugia']; 
    $obj->Identificacion_Cirugia = $_POST['Identificacion_Cirugia']; 
    $obj->Direccion_Cirugia = $_POST['Direccion_Cirugia']; 
    $obj->Celular_Cirugia = $_POST['Celular_Cirugia']; 
    $obj->PreQuirurgicos = $_POST['PreQuirurgicos']; 
    $obj->AutorizaCirugia_Cirugia = $_POST['AutorizaCirugia_Cirugia']; 
    $obj->Observacion_Cirugia = $_POST['Observacion_Cirugia'];
    
    $obj->agregar_Cirugia();
}

if (isset($_POST['modificar'])) {
    $obj->Codigo_Cirugia = $_POST['Codigo_Cirugia'];
    $obj->Fecha_Cirugia = $_POST['Fecha_Cirugia'];
    $obj->NombrePaciente_Cirugia = $_POST['NombrePaciente_Cirugia'];
    $obj->Especie_Cirugia = $_POST['Especie_Cirugia'];
    $obj->Raza_Cirugia = $_POST['Raza_Cirugia'];
    $obj->Sexo_Cirugia = $_POST['Sexo_Cirugia'];
    $obj->Edad_Cirugia = $_POST['Edad_Cirugia']; 
    $obj->Peso_Cirugia = $_POST['Peso_Cirugia']; 
    $obj->TipoProcedimiento_Cirugia = $_POST['TipoProcedimiento_Cirugia']; 
    $obj->TipoAnestecia_Cirugia = $_POST['TipoAnestecia_Cirugia']; 
    $obj->NombrePropietario_Cirugia = $_POST['NombrePropietario_Cirugia']; 
    $obj->Identificacion_Cirugia = $_POST['Identificacion_Cirugia']; 
    $obj->Direccion_Cirugia = $_POST['Direccion_Cirugia']; 
    $obj->Celular_Cirugia = $_POST['Celular_Cirugia']; 
    $obj->PreQuirurgicos = $_POST['PreQuirurgicos']; 
    $obj->AutorizaCirugia_Cirugia = $_POST['AutorizaCirugia_Cirugia']; 
    $obj->Observacion_Cirugia = $_POST['Observacion_Cirugia'];

    $obj->modificar_Cirugia();
}

if (isset($_POST['eliminar'])) {
    $obj->Codigo_Cirugia = $_POST['Codigo_Cirugia'];

    $obj->eliminar_Cirugia();
}















?>