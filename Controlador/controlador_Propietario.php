<?php
//--------------------- CONTROLADOR USUARIO PARA AGREGAR USUARIO-------------------------------
class Propietario{
        public $Documento_Propietario;
        public $NombreA_Propietario ;
        public $NombreB_Propietario ;
        public $ApellidoA_Propietario ;
        public $ApellidoB_Propietario ;
        public $Direccion_Propietario;
        public $Telefono_Propietario;
        public $Celular_Propietario;
        public $Correo_Propietario;
        

        function agregarUsuario(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM  propietario where Documento_Propietario = '$this->Documento_Propietario'";
            $resultado= mysqli_query($conecta,$consulta);

            if(mysqli_fetch_array($resultado)){
                echo"<script>
                    alert('El usuario ya se encuentra en el sistema')
                </script>";
            }
            else{
                $insertar = "INSERT INTO propietario VALUES ('$this->Documento_Propietario',
                                                            '$this->NombreA_Propietario',
                                                            '$this->NombreB_Propietario',
                                                            '$this->ApellidoA_Propietario',
                                                            '$this->ApellidoB_Propietario',
                                                            '$this->Direccion_Propietario',
                                                            '$this->Telefono_Propietario',
                                                            '$this->Celular_Propietario',
                                                            '$this->Correo_Propietario'
                            )";
                echo $insertar;            
                mysqli_query($conecta,$insertar);
                echo"<script>
                    alert('El usuario a sido registrado exitosamente')
                </script>";
            }
        }

        function modifcarUsuario(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $consulta = "SELECT * FROM propietario WHERE Documento_Propietario = '$this->Documento_Propietario'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('El Documento ya existe en el Sistema')</script>";
            }else{
                    $modificar = "UPDATE propietario SET Documento_Propietario = '$this->Documento_Propietario',
                                                         NombreA_Propietario = '$this->NombreA_Propietario',
                                                         NombreB_Propietario = '$this->NombreB_Propietario',
                                                         ApellidoA_Propietario = '$this->ApellidoA_Propietario',
                                                         ApellidoB_Propietario = '$this->ApellidoB_Propietario',
                                                         Direccion_Propietario = '$this->Direccion_Propietario',
                                                         Telefono_Propietario = '$this->Telefono_Propietario',
                                                         Celular_Propietario = '$this->Celular_Propietario',
                                                         Correo_Propietario = '$this->Correo_Propietario'
                                                    WHERE Documento_Propietario = '$this->Documento_Propietario'";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('Los datos fueron modificados Correctamente')</script>";
            }
        }

        function eliminarUsuario(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM propietario where Documento_Propietario = '$this->Documento_Propietario'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('El Cliente Fue Eliminado en el Sistema')</script>";
            }else{
                echo "<script> alert('El Cliente No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }
        }
}
?>
