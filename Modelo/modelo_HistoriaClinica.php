<?php 
include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_HistoriaClinica.php";

$obj = new historia_clinica();

if (isset($_POST['agregar'])) {
    $obj->FK_DocumentoMedico = $_POST['Documento_Medico'];
    $obj->agregar_HistoriaClinica();
}
if (isset($_POST['eliminar'])) {
    $obj->Codigo_HistoriaClinica = $_POST['Codigo_HistoriaClinica'];
    $obj->eliminar_HistoriaClinica();
   }








?>
