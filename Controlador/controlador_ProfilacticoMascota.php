<?php
//--------------------- CONTROLADOR USUARIO PARA AGREGAR USUARIO-------------------------------
class ProfilacticoMascota{
        public $FK_CodigoMascota;
        public $FK_CodigoProfilactico;
        public $Fecha_ProfilacticoMascota;
        public $Dosis_ProfilacticoMascota;
        public $Administracion_ProfilacticoMascota;
        public $Observacion_ProfilacticoMascota;
        

        function agregarProfilacticoMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM  profilactico_mascota where FK_CodigoMascota = '$this->FK_CodigoMascota' AND FK_CodigoProfilactico = '$this->FK_CodigoProfilactico'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('El Profilactico ya se encuentra en el sistema')
                </script>";
            }
            else{
                $insertar = "INSERT INTO profilactico_mascota VALUES ('$this->FK_CodigoMascota',
                                                                    '$this->FK_CodigoProfilactico',
                                                                    '$this->Fecha_ProfilacticoMascota',
                                                                    '$this->Dosis_ProfilacticoMascota',
                                                                    '$this->Administracion_ProfilacticoMascota',
                                                                    '$this->Observacion_ProfilacticoMascota'
                                                                    )";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('El Profilactico a sido registrado exitosamente')
                </script>";
            }
        }

        function modificarProfilacticoMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM profilactico_mascota WHERE FK_CodigoMascota = '$this->FK_CodigoMascota' AND FK_CodigoProfilactico = '$this->FK_CodigoProfilactico'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('El Profilactico ya existe en el Sistema')</script>";
            }else{
                    $modificar = "UPDATE profilactico_mascota SET FK_CodigoProfilactico = '$this->FK_CodigoProfilactico',
                                                                    Fecha_ProfilacticoMascota = '$this->Fecha_ProfilacticoMascota',
                                                                    Dosis_ProfilacticoMascota = '$this->Dosis_ProfilacticoMascota',
                                                                    Administracion_ProfilacticoMascota = '$this->Administracion_ProfilacticoMascota',
                                                                    Observacion_ProfilacticoMascota = '$this->Observacion_ProfilacticoMascota'
                                                                    WHERE FK_CodigoProfilactico = '$this->FK_CodigoProfilactico' AND FK_CodigoMascota = '$this->FK_CodigoMascota'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('El Profilactico Fue Modificado en el Sistema')</script>";
            }
        }

        function eliminarProfilacticoMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM profilactico_mascota where FK_CodigoProfilactico = '$this->FK_CodigoProfilactico' AND FK_CodigoMascota = '$this->FK_CodigoMascota' ";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('El Profilactico Fue Eliminado en el Sistema')</script>";
            }else{
                echo "<script> alert('El Profilactico No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
