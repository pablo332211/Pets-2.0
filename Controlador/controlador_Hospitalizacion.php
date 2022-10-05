<?php
    class Hospitalizacion{
        public $Codigo_Hospitalizacion;
        public $FechaIngreso_Hospitalizacion;
        public $FechaSalida_Hospitalizacion;

        function agregar_Hospitalizacion(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $consulta ="SELECT * FROM hospitalizacion WHERE Codigo_Hospitalizacion = '$this->Codigo_Hospitalizacion'";
            $resultado = mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo "<script>alert ('La hospitalizacion ya se encuentra creada en el sisteman')</script>";
            }
            else{
                $insertar="INSERT INTO hospitalizacion VALUES (NULL,'$this->FechaIngreso_Hospitalizacion','$this->FechaSalida_Hospitalizacion')";
                echo $insertar;
                mysqli_query($conecta,$insertar);
                echo "<script>alert ('La hospitalizacion a sido creada exitosamente')</script>";
            }
        }

        function modificar_Hospitalizacion(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $consulta="SELECT * FROM hospitalizacion WHERE Codigo_Hospitalizacion ='$this->Codigo_Hospitalizacion'";
            $resultado = mysqli_query($conecta,$consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script>alert ('La hospitalizacion ya se encuentra en el sistema')</script>";
            }
            else{
                $modificar="UPDATE hospitalizacion SET Codigo_Hospitalizacion = '$this->Codigo_Hospitalizacion',
                                                        FechaIngreso_Hospitalizacion ='$this->FechaIngreso_Hospitalizacion',
                                                        FechaSalida_Hospitalizacion ='$this->FechaSalida_Hospitalizacion'
                                                    WHERE Codigo_Hospitalizacion ='$this->Codigo_Hospitalizacion'";
                echo $modificar;
                mysqli_query($conecta,$modificar);
                echo "<script>alert ('La hospitalizacion ha sido modificada exitosamente')</script>";
            }
        }

        function eliminar_Hospitalizacion(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM hospitalizacion WHERE Codigo_Hospitalizacion ='$this->Codigo_Hospitalizacion'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script>alert ('La hospitalizacion ha sido eliminada exitosamente')</script>";
            }
            else{
                echo "<script>alert ('La hospitalizacion no se puede eliminar por registros relacionados')</script>";
            } 
        }
    }
?>