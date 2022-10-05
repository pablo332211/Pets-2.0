<?php
    class Remision{
        public $Codigo_Remision;
        public $Fecha_Remision;
        public $Especialista_Remision;
        public $Celular_Remision;
        public $Entidad_Remision;
        public $Observacion_Remision;

            function agregar_Remision(){
                $clas = new Conexion();
                $conecta = $clas->conectarServidor();
                $insertar = "INSERT INTO remision VALUES (NULL,
                                                            '$this->Fecha_Remision',
                                                            '$this->Especialista_Remision',
                                                            '$this->Celular_Remision',
                                                            '$this->Entidad_Remision',
                                                            '$this->Observacion_Remision'
                                                        )";
                echo $insertar;
                mysqli_query($conecta,$insertar);
                echo"<script> alert('La remision a sido registrada exitosamente') </script>";
            }

            function modificar_Remision(){
                $clas = new Conexion();
                $conecta = $clas->conectarServidor();
                $consulta = "SELECT * FROM remision WHERE Codigo_Remision = '$this->Codigo_Remision'";
                $resultado = mysqli_query($conecta, $consulta);
                if(!mysqli_fetch_array($resultado)){
                    echo "<script> alert('La remision ya existe en el Sistema') </script>";
                }else{
                        $modificar = "UPDATE remision SET Codigo_Remision = '$this->Codigo_Remision',
                                                            Fecha_Remision = '$this->Fecha_Remision',
                                                            Especialista_Remision = '$this->Especialista_Remision',
                                                            Celular_Remision = '$this->Celular_Remision',
                                                            Entidad_Remision = '$this->Entidad_Remision',
                                                            Observacion_Remision = '$this->Observacion_Remision'
                                                        WHERE Codigo_Remision = '$this->Codigo_Remision'";
                        echo $modificar;
                        mysqli_query($conecta,$modificar);                                    
                        echo "<script> alert('La remision fue Modificada en el Sistema')</script>"; 
                }
            }

            function eliminar_Remision(){
                $clas = new Conexion();
                $conecta = $clas->conectarServidor();
                $eliminar="DELETE FROM remision where Codigo_Remision = '$this->Codigo_Remision'";
                echo $eliminar;
                if(mysqli_query($conecta,$eliminar)){
                    echo "<script> alert('La remision fue eliminada en el Sistema')</script>";
                }else{
                    echo "<script> alert('La remision No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                }
            }
    }
?>