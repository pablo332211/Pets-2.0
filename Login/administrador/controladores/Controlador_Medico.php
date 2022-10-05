
<?php
class medico
{

  public  $Documento_Medico;
  public  $NombreA_Medico;
  public  $NombreB_Medico;
  public  $ApellidoA_Medico;
  public  $ApellidoB_Medico;
  public  $Correo_Medico;
  public  $Telefono_Medico;
  public  $Celular_Medico;
  public  $Contrasena_Medico;

  function agregarMedico()
  {
    $clas = new conexion();
    $conecta = $clas->conectarServidor();
    $consulta = "SELECT * FROM medico WHERE Documento_Medico = '$this->Documento_Medico'";
    $resultado = mysqli_query($conecta, $consulta);
    if (mysqli_fetch_array($resultado)) {
      echo "<script> alert('El documento ya existe en el sistema')</script>";
    } else {
      $insertar = "INSERT INTO medico VALUES('$this->Documento_Medico','$this->NombreA_Medico','$this->NombreB_Medico','$this->ApellidoA_Medico','$this->ApellidoB_Medico','$this->Correo_Medico','$this->Telefono_Medico','$this->Celular_Medico','$this->Contrasena_Medico','2' )";
      mysqli_query($conecta, $insertar);
      echo "<script> alert ('Los datos han sido ingresados')</script>";
    }
  }

  function modifcarMedico(){
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $consulta = "SELECT * FROM medico WHERE Documento_Medico = '$this->Documento_Medico'";
    $resultado = mysqli_query($conecta, $consulta);
    if(!mysqli_fetch_array($resultado)){
        echo "<script> alert('El Documento ya existe en el Sistema')</script>";
    } else {
      $modificar= "UPDATE medico SET Documento_Medico = '$this->Documento_Medico',
                                     NombreA_Medico = '$this->NombreA_Medico',
                                     NombreB_Medico = '$this->NombreB_Medico',
                                     ApellidoA_Medico = '$this->ApellidoA_Medico',
                                     ApellidoB_Medico = '$this->ApellidoB_Medico',
                                     Correo_Medico = '$this->Correo_Medico',
                                     Telefono_Medico = '$this->Telefono_Medico',
                                     Celular_Medico = '$this->Celular_Medico',
                                     Contrasena_Medico = '$this->Contrasena_Medico'
                                     WHERE Documento_Medico = '$this->Documento_Medico';";
                                     echo $modificar;
      mysqli_query($conecta, $modificar);
      echo "<script> alert ('los datos fueron modificados')</script>";
    }
  }

  function eliminarMedico(){
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $eliminar="DELETE FROM medico where Documento_Medico = '$this->Documento_Medico'";
    echo $eliminar;
    if(mysqli_query($conecta,$eliminar)){
        echo "<script> alert('El Medico Fue Eliminado en el Sistema')</script>";
    }else{
        echo "<script> alert('El Medico No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
    }
}
}




?>