<?php 

class citaMedica_Propietario{

    public $FK_DocumentoPropietario;
    public $FK_CodigoCitaMedica;
    public $Fecha_CitaMedica;
    public $Observacion_CitaMedica;

        function agregar_CitaMedicaPropietario(){
        $clas = new conexion();
        $conecta = $clas->conectarServidor();
            $insertar = "INSERT INTO propietario_citamedica(FK_DocumentoPropietario,Fecha_CitaMedica,Observacion_CitaMedica) VALUES ('$this->FK_DocumentoPropietario','$this->Fecha_CitaMedica','$this->Observacion_CitaMedica')";
            echo $insertar;            
        mysqli_query($conecta,$insertar);
        }

        function modificar_CitaMedicaPropietario(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
                $consulta = "SELECT * FROM propietario_citamedica WHERE FK_DocumentoPropietario  = '$this->FK_DocumentoPropietario'";
                $resultado = mysqli_query($conecta, $consulta);
                    if(!mysqli_fetch_array($resultado)){
                        echo "<script> alert('La Cita medica ya existe en el Sistema')</script>";
                    }else{
                            $modificar = "UPDATE propietario_citamedica SET Fecha_CitaMedica ='$this->Fecha_CitaMedica', 
                                                                            Observacion_CitaMedica ='$this->Observacion_CitaMedica' 
                                                                        WHERE FK_DocumentoPropietario  = '$this->FK_DocumentoPropietario' AND FK_CodigoCitaMedica = '$this->FK_CodigoCitaMedica'";
                            echo $modificar;
                            mysqli_query($conecta,$modificar);                                    
                            echo "<script> alert('La CITA MEDICA fue modificada en el Sistema')</script>";
                    }
            }

        function elimiminar_CitaMedicaPropietario(){
            $clas = new conexion();
            $conecta = $clas->conectarServidor();
                $eliminar = "DELETE FROM propietario_citamedica where FK_CodigoCitaMedica = '$this->FK_CodigoCitaMedica'";
                echo $eliminar;
                    if (mysqli_query($conecta,$eliminar)) {
                        echo "<script> alert('La CITA MEDICA fue eliminada en el Sistema')</script>";
                    } else{
                        echo "<script> alert('La CITA MEDICA no puede ser eliminada del Sistema')</script>";
                    }
        }
}




?>