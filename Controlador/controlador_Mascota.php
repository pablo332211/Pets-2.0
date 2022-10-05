<?php
//--------------------- CONTROLADOR USUARIO PARA AGREGAR USUARIO-------------------------------
class Mascota{
        public $Codigo_Mascota;
        public $FK_DocumentoPropietario;
        public $Nombre_Mascota ;
        public $Edad_Mascota ;
        public $FK_EspecieMascota ;
        public $FK_GeneroMascota;
        public $Color_Mascota;
        public $Observacion_Mascota;
        

        function agregarMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            
                $insertar = "INSERT INTO mascota (FK_DocumentoPropietario,
                                                Nombre_Mascota,
                                                FK_EspecieMascota,
                                                Color_Mascota,
                                                Edad_Mascota,
                                                FK_GeneroMascota,
                                                Observacion_Mascota)
                                                VALUES ('$this->FK_DocumentoPropietario',
                                                        '$this->Nombre_Mascota',
                                                        '$this->FK_EspecieMascota',
                                                        '$this->Color_Mascota',
                                                        '$this->Edad_Mascota',
                                                        '$this->FK_GeneroMascota',
                                                        '$this->Observacion_Mascota')";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('La mascota a sido registrada exitosamente')
                </script>";
        }

        function modifcarMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM mascota WHERE Codigo_Mascota = '$this->Codigo_Mascota'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('La mascota ya existe en el sistema')</script>";
            }else{
                    $modificar = "UPDATE mascota SET Codigo_Mascota = '$this->Codigo_Mascota',
                                                         Nombre_Mascota = '$this->Nombre_Mascota',
                                                         FK_EspecieMascota = '$this->FK_EspecieMascota',
                                                         Color_Mascota = '$this->Color_Mascota',
                                                         Edad_Mascota = '$this->Edad_Mascota',
                                                         FK_GeneroMascota = '$this->FK_GeneroMascota',
                                                         Observacion_Mascota = '$this->Observacion_Mascota'
                                                WHERE Codigo_Mascota = '$this->Codigo_Mascota'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('El Documento Fue Modificado en el Sistema')</script>";
            }
        }

        function eliminarMascota(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM mascota where Codigo_Mascota = '$this->Codigo_Mascota'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La mascota fue eliminada del sistema')</script>";
            }else{
                echo "<script> alert('La Mascota no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
