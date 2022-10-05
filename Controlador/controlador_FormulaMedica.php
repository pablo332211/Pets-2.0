<?php
class Formula_Medica{
        public $Codigo_FormulaMedica;
        public $Fecha_FormulaMedica;

        function agregarFormulaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();

            $consulta = "SELECT * FROM  formula_medica where Codigo_FormulaMedica = '$this->Codigo_FormulaMedica'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('La Formula Medica ya se encuentra en el sistema')
                </script>";
            }
            else{
                $insertar = "INSERT INTO formula_medica (Codigo_FormulaMedica,Fecha_FormulaMedica) VALUES (NULL, CURRENT_TIMESTAMP)";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('El Formula Medica a sido registrada exitosamente')
                </script>";
            }
        }

        function modifcarFormulaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM formula_medica WHERE Codigo_FormulaMedica = '$this->Codigo_FormulaMedica'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('El Formula Medica ya se encuentra en el sistema')</script>";
            }else{
                    $modificar = "UPDATE formula_Medica SET Codigo_FormulaMedica = '$this->Codigo_FormulaMedica',
                                                            Fecha_FormulaMedica='$this->FechaFormulaMedica'
                                                        WHERE Codigo_FormulaMedica = '$this->Codigo_FormulaMedica'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('La Formula Medica fue modificada en el Sistema')</script>";
            }
        }

        function eliminarFormulaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM formula_medica where Codigo_FormulaMedica = '$this->Codigo_FormulaMedica'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La Formula Medica Fue eliminada del sistema')</script>";
            }else{
                echo "<script> alert('La Formula Medica no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
