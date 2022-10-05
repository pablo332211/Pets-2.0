<?php
//--------------------- CONTROLADOR USUARIO PARA AGREGAR USUARIO-------------------------------
class Profilactico{
        public $Codigo_Profilactico;
        public $Nombre_Profilactico;
        public $Presentacion_Profilactico ;

        function consulta_Profilactico(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM  profilactico WHERE Nombre_Profilactico = '$this->Nombre_Profilactico' AND Presentacion_Profilactico = '$this->Presentacion_Profilactico'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('El profilactico ya se encuentra en la formula medica');
                </script>";
            }
            else{
?>
                    <script> 
                            if(window.confirm("Profilactico no creado, DESEA CREAR ESTE MEDICAMENTO?")){
                                <?php
                                    $insertar = "INSERT INTO profilactico VALUES (NULL,
                                                                                '$this->Nombre_Profilactico',
                                                                                '$this->Presentacion_Profilactico')";
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
