<?php
    class FormulaMedica_Medicamento{
        public $FK_CodigoFormulaMedica;
        public $FK_CodigoMedicamento;
        public $Dosis_Medicamento;
        public $FK_CodigoAdministracion;
        public $Observacion_Medicamento;


        function agregar_FormulaMedicaMedicamento(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();

            $insertar ="INSERT INTO formulamedica_medicamento VALUES ('$this->FK_CodigoFormulaMedica',
                                                                        '$this->FK_CodigoMedicamento',
                                                                        '$this->Dosis_Medicamento',
                                                                        '$this->FK_CodigoAdministracion',
                                                                        '$this->Observacion_Medicamento' )";
            echo $insertar;
            mysqli_query($conecta,$insertar);
            echo "<script> alert('Medicamento anexado con exito a la formula medica')</script>";
        }

        function modificar_FormulaMedicaMedicamento(){
            $clas= new Conexion;
            $conecta = $clas->conectarServidor();

            $consulta = "SELECT * FROM formulamedica_medicamento WHERE FK_CodigoFormulaMedica = '$this->FK_CodigoFormulaMedica' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento'";
            $resultado = mysqli_query($conecta, $consulta);
            if(!mysqli_fetch_array($resultado)){
                echo "<script> alert('El Formula Medica ya se encuentra en el sistema')</script>";
            }else{
                    $modificar = "UPDATE formulamedica_medicamento SET FK_CodigoFormulaMedica = '$this->FK_CodigoFormulaMedica',
                                                                        FK_CodigoMedicamento = '$this->FK_CodigoMedicamento',
                                                                        Dosis_Medicamento = '$this->Dosis_Medicamento',
                                                                        FK_CodigoAdministracion = '$this->FK_CodigoAdministracion',
                                                                        Observacion_Medicamento = '$this->Observacion_Medicamento'
                                                                    WHERE FK_CodigoFormulaMedica = '$this->FK_CodigoFormulaMedica' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento' ";
                    echo $modificar;
                    mysqli_query($conecta,$modificar);                                    
                    echo "<script> alert('La formula medica modificada con exito')</script>";
            }
        }

        function eliminar_FormulaMedicaMedicamento(){
            $clas = new Conexion();
            $conecta = $clas->conectarServidor();
            $eliminar="DELETE FROM formulamedica_medicamento WHERE FK_CodigoFormulaMedica = '$this->FK_CodigoFormulaMedica' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento'";
            echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La Formula Medica Fue eliminada del sistema')</script>";
            }else{
                echo "<script> alert('La Formula Medica no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }

        }
    }
?>