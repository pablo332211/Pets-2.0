<<?php
    class HistoriaClinica_Remision{
        public $FK_CodigoHistoriaClinica;
        public $FK_CodigoRemision;
        
        function agregar_HistoriaClinicaRemision(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_Remision FROM remision ORDER BY Codigo_Remision DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoRemision = $arreglo[0];

            $insertar = "INSERT INTO historiaclinica_remision VALUES ('$this->FK_CodigoHistoriaClinica','$this->FK_CodigoRemision')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script>
                    alert('llegue aqui Despues')
                </script>";
        }

        function eliminar_HistoriaClinicaRemision(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM historiaclinica_remision WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoRemision = '$this->FK_CodigoRemision'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }
    }
?> 