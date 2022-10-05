<?php
class examen{
        public $Codigo_Examen;
        public $Fecha_Examen;
        public $Tipo_Examen;
        public $Correo_Examen;
        public $Resultado_Examen;
        public $Observacion_Examen;

        function agregar_Examen(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM  examen where Codigo_Examen = '$this->Codigo_Examen'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('La examen ya se encuentra en el sistema')
                </script>";
            }
            else{
                $insertar = "INSERT INTO examen (Codigo_Examen,Fecha_Examen,Tipo_Examen,Correo_Examen,Resultado_Examen,Observacion_Examen) 
                                    VALUES (NULL, '$this->Fecha_Examen', '$this->Tipo_Examen', '$this->Correo_Examen', '$this->Resultado_Examen', '$this->Observacion_Examen')";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('El examen a sido registrada exitosamente')
                </script>";
            }
        }

        function modifcar_Examen(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM examen WHERE Codigo_Examen = '$this->Codigo_Examen'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('El examen ya se encuentra en el sistema')</script>";
            }else{
                    $modificar = "UPDATE examen SET Codigo_Examen = '$this->Codigo_Examen',
                                                    Fecha_Examen = '$this->Fecha_Examen',
                                                    Tipo_Examen = '$this->Tipo_Examen',
                                                    Correo_Examen = '$this->Correo_Examen',
                                                    Resultado_Examen = '$this->Resultado_Examen',
                                                    Observacion_Examen='$this->Observacion_Examen'
                                                WHERE Codigo_Examen = '$this->Codigo_Examen'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('La examen fue modificada en el Sistema')</script>";
            }
        }

        function eliminar_Examen(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM examen where Codigo_Examen = '$this->Codigo_Examen'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La examen Fue eliminada del sistema')</script>";
            }else{
                echo "<script> alert('La examen no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
