<?php
//--------------------- CONTROLADOR CITA MEDICA  -------------------------------
class cita_medica{
        public $Codigo_CitaMedica;
        public $FK_DocumentoMedico;
        public $TipoCita_CitaMedica;
        public $Oidos_CitaMedica;
        public $FrecCardiaca_CitaMedica;
        public $Auscultacion_CitaMedica;
        public $FrecRespiratoria_CitaMedica;
        public $Ojos_CitaMedica;
        public $Mucosas_CitaMedica;
        public $Peso_CitaMedica;
        public $Tilc_CitaMedica;
        public $Ganglios_CitaMedica;
        public $Palpitacion_CitaMedica;
        public $CavidadOral_CitaMedica;
        public $Nervioso_CitaMedica;
        public $Temperatura_CitaMedica;
        public $Tegumento_CitaMedica;
        public $Observacion_CitaMedica;
        

        function agregar_CitaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM cita_medica where Codigo_CitaMedica = '$this->Codigo_CitaMedica'";
            $insertar = "INSERT INTO cita_medica  VALUES(NULL,'123444','','','','','','','','','','','','','','','','')";

            echo $insertar;            
            mysqli_query($conecta,$insertar);
            echo "<script> alert('La CITA Fue creada con exito')</script>";
        }


        function modificar_CitaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
                $consulta = "SELECT * FROM cita_medica WHERE Codigo_CitaMedica = '$this->Codigo_CitaMedica'";
                $resultado = mysqli_query($conecta, $consulta);
                    if(mysqli_fetch_array($resultado)){
                        echo "<script> alert('La cita  ya existe en el Sistema')</script>";
                    }else{
                            $modificar = "UPDATE cita_medica SET Codigo_CitaMedica='$this->Codigo_CitaMedica',TipoCita_CitaMedica='$this->TipoCita_CitaMedica',
                            Oidos_CitaMedica='$this->Oidos_CitaMedica',
                            FrecCardiaca_CitaMedica='$this->FrecCardiaca_CitaMedica',
                            Auscultacion_CitaMedica='$this->Auscultacion_CitaMedica',
                            FrecRespiratoria_CitaMedica='$this->FrecRespiratoria_CitaMedica',
                            Ojos_CitaMedica='$this->Ojos_CitaMedica',
                            Mucosas_CitaMedica='$this->Mucosas_CitaMedica',
                            Peso_CitaMedica='$this->Peso_CitaMedica',
                            Tilc_CitaMedica='$this->Tilc_CitaMedica',
                            Ganglios_CitaMedica='$this->Ganglios_CitaMedica',
                            Palpitacion_CitaMedica='$this->Palpitacion_CitaMedica',
                            CavidadOral_CitaMedica='$this->CavidadOral_CitaMedica',
                            Nervioso_CitaMedica='$this->Nervioso_CitaMedica',
                            Temperatura_CitaMedica='$this->Temperatura_CitaMedica',
                            Tegumento_CitaMedica='$this->Tegumento_CitaMedica',
                            Observacion_CitaMedica='$this->Observacion_CitaMedica'
                            WHERE Codigo_CitaMedica  = '$this->Codigo_CitaMedica'";
                            echo $modificar;
                            mysqli_query($conecta,$modificar);                                    
                            echo "<script> alert('El cita Fue creada en el Sistema')</script>";
                    }
        }

        function eliminar_CitaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
                $eliminar="DELETE FROM cita_medica where Codigo_CitaMedica = '$this->Codigo_CitaMedica'";
                echo $eliminar;
                    if(mysqli_query($conecta,$eliminar)){
                        echo "<script> alert('La HISTORIA CLINICA Fue Eliminado en el Sistema')</script>";
                    }else{
                        echo "<script> alert('La HISTORIA CLINICA No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
                    }
        }
}
?>
