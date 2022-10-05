<?php
class Prueba_Laboratorio{
        public $Codigo_PruebaLaboratorio;
        public $Nombre_PruebaLaboratorio;
        public $Tipo_PruebaLaboratorio;
        public $Fecha_PruebaLaboratorio;
        public $Laboratorio_PruebaLaboratorio;
        public $Resultado_PruebaLaboratorio;

        function agregar_PruebaLaboratorio(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM  prueba_laboratorio where Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('La Prueba de Laboratorio ya se encuentra en el sistema')
                </script>";
            }
            else{
                $insertar = "INSERT INTO prueba_laboratorio (Codigo_PruebaLaboratorio,Nombre_PruebaLaboratorio,Tipo_PruebaLaboratorio,Fecha_PruebaLaboratorio,Laboratorio_PruebaLaboratorio,Resultado_PruebaLaboratorio) 
                                    VALUES (NULL, '$this->Nombre_PruebaLaboratorio', '$this->Tipo_PruebaLaboratorio', '$this->Fecha_PruebaLaboratorio', '$this->Laboratorio_PruebaLaboratorio','$this->Resultado_PruebaLaboratorio')";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('La Prueba de Laboratorio a sido registrada exitosamente')
                </script>";
            }
        }

        function modifcar_PruebaLaboratorio(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM prueba_laboratorio WHERE Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('La Prueba de Laboratorio ya se encuentra en el sistema')</script>";
            }else{
                    $modificar = "UPDATE prueba_laboratorio SET Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio',
                                                    Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio',
                                                    Tipo_PruebaLaboratorio = '$this->Tipo_PruebaLaboratorio',
                                                    Fecha_PruebaLaboratorio = '$this->Fecha_PruebaLaboratorio',
                                                    Laboratorio_PruebaLaboratorio = '$this->Laboratorio_PruebaLaboratorio',
                                                    Resultado_PruebaLaboratorio='$this->Resultado_PruebaLaboratorio'
                                                WHERE Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('La Prueba de Laboratorio fue modificada en el Sistema')</script>";
            }
        }

        function eliminar_PruebaLaboratorio(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM prueba_laboratorio where Codigo_PruebaLaboratorio = '$this->Codigo_PruebaLaboratorio'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La Prueba de Laboratorio Fue eliminada del sistema')</script>";
            }else{
                echo "<script> alert('La Prueba de Laboratorio no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
