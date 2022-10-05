<<?php
    class HistoriaClinica_Hospitalizacion{
        public $FK_CodigoHistoriaClinica;
        public $FK_CodigoHospitalizacion;

        function agregar_HistoriaClinicaHospitalizacion(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_Hospitalizacion FROM hospitalizacion ORDER BY Codigo_Hospitalizacion DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoHospitalizacion = $arreglo[0];

            $insertar = "INSERT INTO historiaclinica_hospitalizacion VALUES ('$this->FK_CodigoHistoriaClinica','$this->FK_CodigoHospitalizacion')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script>
                    alert('llegue aqui Despues')
                </script>";
        }

        function eliminar_HistoriaClinicaHospitalizacion(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM historiaclinica_hospitalizacion WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoHospitalizacion = '$this->FK_CodigoHospitalizacion'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }
    }
?> 