<?php 
  include "C:/wamp64/www/Pets-SENA-master/Controlador/controlador_MedicamentoCirugia.php";

  $obj = new medicamento_Cirugia();

  if(isset($_POST['agregar'])){
      $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
      $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];
      $obj->Dosis_MedicamentoCirugia = $_POST['Dosis_MedicamentoCirugia'];
      $obj->Administracion_MedicamentoCirugia = $_POST['Administracion_MedicamentoCirugia'];
      $obj->Observacion_MedicamentoCirugia = $_POST['Observacion_MedicamentoCirugia'];

      $obj->agregar_MedicamentoCirugia();
  }

  if(isset($_POST['modificar'])){
      $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
      $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];
      $obj->Dosis_MedicamentoCirugia = $_POST['Dosis_MedicamentoCirugia'];
      $obj->Administracion_MedicamentoCirugia = $_POST['Administracion_MedicamentoCirugia'];
      $obj->Observacion_MedicamentoCirugia = $_POST['Observacion_MedicamentoCirugia'];

      $obj->modificar_MedicamentoCirugia();
  }
  if(isset($_POST['eliminarMedCir'])){
    $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];
    $obj->FK_CodigoMedicamento = $_POST['FK_CodigoMedicamento'];
    $obj->eliminar_MedicamentoCirugia();
    }

  if(isset($_POST['eliminar'])){
      $obj->FK_CodigoCirugia = $_POST['FK_CodigoCirugia'];
      
      $obj->eliminar_MedicamentoCirugiaTotal();
  }

  

?>