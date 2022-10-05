<<?php
    class HistoriaClinica_Examen{
        public $FK_CodigoHistoriaClinica;
        public $FK_CodigoExamen;

        function agregar_HistoriaClinicaExamen(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_Examen FROM examen ORDER BY Codigo_Examen DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoExamen = $arreglo[0];

            $insertar = "INSERT INTO historiaclinica_examen VALUES ('$this->FK_CodigoHistoriaClinica','$this->FK_CodigoExamen')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script>
                    alert('llegue aqui Despues')
                </script>";
        }

        function eliminar_HistoriaClinicaExamen(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM historiaclinica_formulamedica WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoExamen = '$this->FK_CodigoExamen'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }
    }
?> 