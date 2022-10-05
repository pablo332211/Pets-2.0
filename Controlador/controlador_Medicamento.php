<?php
//--------------------- CONTROLADOR USUARIO PARA AGREGAR USUARIO-------------------------------
class Medicamento{
        public $Codigo_Medicamento;
        public $Nombre_Medicamento;
        public $FK_CodigoPresentacion;
        public $Tipo_Medicamento;
        public $Concentracion_Medicamento;
        

        function consultaMedicamento(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $query = "SELECT * FROM  medicamento WHERE Nombre_Medicamento = '$this->Nombre_Medicamento' AND FK_CodigoPresentacion = '$this->FK_CodigoPresentacion'";
            $resultado= mysqli_query($conecta,$query);
            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('El medicamento ya se encuentra en la formula medica');
                </script>";
            }
            else{
?>
                    <script> 
                            if(window.confirm("Medicamento no creado, DESEA CREAR ESTE MEDICAMENTO?")){
                                <?php
                                    $insertar = "INSERT INTO medicamento VALUES (NULL,
                                                                                '$this->Nombre_Medicamento',
                                                                                '$this->Tipo_Medicamento',
                                                                                '$this->FK_CodigoPresentacion',
                                                                                '$this->Concentracion_Medicamento')";
                                    mysqli_query($conecta,$insertar);
                                ?>
                                alert("Profilactico Cargado a la base de Datos");
                            }
                    </script>
<?php
            }
        }
}
?>
