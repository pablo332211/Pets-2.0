<?php
    class Bitacora{
        public $Codigo_Bitacora;
        public $FechaActual_Bitacora;
        public $FormMedTratada_Bitacora;
        public $Temperatura_Bitacora;
        public $FrecCardiaca_Bitacora;
        public $FrecRespiratoria_Bitacora;
        public $ColorMucosa_Bitacora;
        public $Apetito_Bitacora;
        public $Sed_Bitacora;
        public $EstadoAnimo_Bitacora;
        public $Vomito_Bitacora;
        public $Orina_Bitacora;
        public $GradoHidratacion_Bitacora;
        public $Observacion_Bitacora;

        function agregar_Bitacora(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $consulta ="SELECT * FROM bitacora WHERE Codigo_Bitacora = '$this->Codigo_Bitacora'";
            $resultado = mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo "<script>alert ('La hospitalizacion ya se encuentra creada en el sisteman')</script>";
            }
            else{
                $insertar="INSERT INTO bitacora VALUES (NULL,
                                                                '$this->FechaActual_Bitacora',
                                                                '$this->FormMedTratada_Bitacora',
                                                                '$this->Temperatura_Bitacora',
                                                                '$this->FrecCardiaca_Bitacora',
                                                                '$this->FrecRespiratoria_Bitacora',
                                                                '$this->ColorMucosa_Bitacora',
                                                                '$this->Apetito_Bitacora',
                                                                '$this->Sed_Bitacora',
                                                                '$this->EstadoAnimo_Bitacora',
                                                                '$this->Vomito_Bitacora',
                                                                '$this->Orina_Bitacora',
                                                                '$this->GradoHidratacion_Bitacora',
                                                                '$this->Observacion_Bitacora')";
                echo $insertar;
                mysqli_query($conecta,$insertar);
                echo "<script>alert ('La bitacora a sido creada exitosamente')</script>";
            }


        }

        function modificar_Bitacora(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $consulta="SELECT * FROM bitacora WHERE Codigo_Bitacora ='$this->Codigo_Bitacora'";
            $resultado = mysqli_query($conecta,$consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script>alert ('La Bitacora ya se encuentra en el sistema')</script>";
            }
            else{
                $modificar="UPDATE bitacora SET Codigo_Bitacora = '$this->Codigo_Bitacora',
                                                        FechaActual_Bitacora ='$this->FechaActual_Bitacora',
                                                        FormMedTratada_Bitacora ='$this->FormMedTratada_Bitacora',
                                                        Temperatura_Bitacora ='$this->Temperatura_Bitacora',
                                                        FrecCardiaca_Bitacora ='$this->FrecCardiaca_Bitacora',
                                                        FrecRespiratoria_Bitacora ='$this->FrecRespiratoria_Bitacora',
                                                        ColorMucosa_Bitacora ='$this->ColorMucosa_Bitacora',
                                                        Apetito_Bitacora ='$this->Apetito_Bitacora',
                                                        Sed_Bitacora ='$this->Sed_Bitacora',
                                                        EstadoAnimo_Bitacora ='$this->EstadoAnimo_Bitacora',
                                                        Vomito_Bitacora ='$this->Vomito_Bitacora',
                                                        Orina_Bitacora ='$this->Orina_Bitacora',
                                                        GradoHidratacion_Bitacora ='$this->GradoHidratacion_Bitacora',
                                                        Observacion_Bitacora ='$this->Observacion_Bitacora'
                                            WHERE Codigo_Bitacora ='$this->Codigo_Bitacora'";
                echo $modificar;
                mysqli_query($conecta,$modificar);
                echo "<script>alert ('La Bitacora ha sido modificada exitosamente')</script>";
            }
        }

        function eliminar_Bitacoras(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM bitacora b WHERE EXISTS(SELECT * FROM hospitalizacion_bitacora hb WHERE b.Codigo_Bitacora = hb.FK_CodigoBitacora AND hb.FK_CodigoHospitalizacion = '$this->FK_CodigoHospitalizacion')";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script>alert ('La bitacora ha sido eliminada exitosamente')</script>";
            }
            else{
                echo "<script>alert ('La bitacora no se puede eliminar por registros relacionados')</script>";
            } 
        }


        function eliminar_Bitacora(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM bitacora WHERE Codigo_Bitacora = '$this->Codigo_Bitacora'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script>alert ('La bitacora ha sido eliminada exitosamente')</script>";
            }
            else{
                echo "<script>alert ('La bitacora no se puede eliminar por registros rel
acionados')</script>";
            } 
        }


    }
?>