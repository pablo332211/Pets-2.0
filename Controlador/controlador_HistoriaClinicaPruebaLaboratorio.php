<<?php
    class HistoriaClinica_PruebaLaboratorio{
        public $FK_CodigoHistoriaClinica;
        public $FK_CodigoPruebaLaboratorio;
        
        function agregar_HistoriaClinicaPruebaLaboratorio(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_PruebaLaboratorio FROM prueba_laboratorio ORDER BY Codigo_PruebaLaboratorio DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoPruebaLaboratorio = $arreglo[0];

            $insertar = "INSERT INTO historiaclinica_pruebalaboratorio VALUES ('$this->FK_CodigoHistoriaClinica','$this->FK_CodigoPruebaLaboratorio')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script>
                    alert('llegue aqui Despues')
                </script>";
        }

        function eliminar_HistoriaClinicaPruebaLaboratorio(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM historiaclinica_pruebalaboratorio WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoPruebaLaboratorio = '$this->FK_CodigoPruebaLaboratorio'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }
    }
?> 