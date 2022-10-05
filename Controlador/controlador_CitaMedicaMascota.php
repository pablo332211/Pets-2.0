<?php 
 class citaMedica_Mascota{

   public $FK_CodigoMascota;
   public $FK_CodigoCitaMedica;

    function agregar_CitaMedicaMascota(){
        $clas = new conexion();
        $conectar = $clas->conectarServidor();
          $insertar = "INSERT INTO mascota_citamedica(FK_CodigoMascota) VALUES ('$this->FK_CodigoMascota')";
          echo $insertar;          
        mysqli_query($conectar,$insertar);
    }

    function eliminar_CitaMedicaMascota(){
      $clas = new conexion();
      $conectar = $clas->conectarServidor();
      $eliminar ="DELETE FROM mascota_citamedica where FK_CodigoCitaMedica = '$this->FK_CodigoCitaMedica'";
      echo $eliminar;
    }
}




















?>