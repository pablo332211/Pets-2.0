<?php
    class Hospitalizacion_Bitacora{
        public $FK_CodigoHospitalizacion;
        public $FK_CodigoBitacora;

        function agregar_HospitalizacionBitacora(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_Bitacora FROM bitacora ORDER BY Codigo_Bitacora DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoBitacora = $arreglo[0];

            $insertar = "INSERT INTO hospitalizacion_bitacora VALUES ('$this->FK_CodigoHospitalizacion','$this->FK_CodigoBitacora')";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo"<script> alert('Enlace realizado') </script>";
        }

        function eliminar_HospitalizacionBitacoras(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            
            $eliminar="DELETE FROM bitacora b WHERE EXISTS(SELECT * FROM hospitalizacion_bitacora hb WHERE b.Codigo_Bitacora = hb.FK_CodigoBitacora AND hb.FK_CodigoHospitalizacion = '$this->FK_CodigoHospitalizacion')";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);

            $eliminar="DELETE FROM hospitalizacion_bitacora WHERE FK_CodigoHospitalizacion = '$this->FK_CodigoHospitalizacion'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }

        function eliminar_HospitalizacionBitacora(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();

            $eliminar="DELETE FROM hospitalizacion_bitacora WHERE FK_CodigoHospitalizacion = '$this->FK_CodigoHospitalizacion' AND FK_CodigoBitacora = '$this->FK_CodigoBitacora'";
            echo $eliminar;
            mysqli_query($conecta,$eliminar);
        }



    }

?>