<<?php
    class HistoriaClinica_FormulaMedica{
        public $FK_CodigoHistoriaClinica;
        public $FK_CodigoFormulaMedica;


        function agregarHistoriaClinicaFormulaMedica(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_FormulaMedica FROM formula_medica ORDER BY Codigo_FormulaMedica DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoFormulaMedica = $arreglo[0];

            $insertar = "INSERT INTO historiaclinica_formulamedica VALUES ('$this->FK_CodigoHistoriaClinica','$this->FK_CodigoFormulaMedica')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script>
                    alert('llegue aqui Despues')
                </script>";
        }

        function eliminarHistoriaClinicaFormulaMedica(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM historiaclinica_formulamedica WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoFormulaMedica = '$this->FK_CodigoFormulaMedica'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }
    }
?> 