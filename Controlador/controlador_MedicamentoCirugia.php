<?php 
class medicamento_Cirugia{

    public $FK_CodigoMedicamento;
    public $FK_CodigoCirugia;
    public $Administracion_MedicamentoCirugia;	
    public $Dosis_MedicamentoCirugia;
    public $Observacion_MedicamentoCirugia;

    function agregar_MedicamentoCirugia(){
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();

        $insertar = "INSERT INTO medicamento_cirugia (FK_CodigoMedicamento, 
                                                        FK_CodigoCirugia, 
                                                        Administracion_MedicamentoCirugia, 
                                                        Dosis_MedicamentoCirugia, 
                                                        Observacion_MedicamentoCirugia) 
                                                VALUES('$this->FK_CodigoMedicamento', 
                                                        '$this->FK_CodigoCirugia',
                                                        '$this->Administracion_MedicamentoCirugia',
                                                        '$this->Dosis_MedicamentoCirugia',
                                                        '$this->Observacion_MedicamentoCirugia') ";
        echo $insertar;
        mysqli_query($conecta,$insertar);
        echo "<script> alert('El Medicamento agregado exitosamente')</script>";
    }

    function modificar_MedicamentoCirugia(){
        $clas= new Conexion;
        $conecta = $clas->conectarServidor();

        $consulta = "SELECT * FROM medicamento_cirugia WHERE FK_CodigoCirugia = '$this->FK_CodigoCirugia' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento'";
        $resultado = mysqli_query($conecta, $consulta);
        if(!mysqli_fetch_array($resultado)){
            echo "<script> alert('El Medicamento ya se encuentra en el sistema')</script>";
        }else{
                $modificar = "UPDATE medicamento_cirugia SET FK_CodigoMedicamento = '$this->FK_CodigoMedicamento',
                                                            FK_CodigoCirugia = '$this->FK_CodigoCirugia',
                                                            Dosis_MedicamentoCirugia = '$this->Dosis_MedicamentoCirugia',
                                                            Administracion_MedicamentoCirugia = '$this->Administracion_MedicamentoCirugia',
                                                            Observacion_MedicamentoCirugia = '$this->Observacion_MedicamentoCirugia'
                                                        WHERE FK_CodigoCirugia = '$this->FK_CodigoCirugia' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento' ";
                echo $modificar;
                mysqli_query($conecta,$modificar);                                    
                echo "<script> alert('La Medicamento fue modificado con exito')</script>";
        }
    }

    function eliminar_MedicamentoCirugia(){
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $eliminar="DELETE FROM medicamento_cirugia WHERE FK_CodigoCirugia = '$this->FK_CodigoCirugia' AND FK_CodigoMedicamento = '$this->FK_CodigoMedicamento' ";
        echo $eliminar;
        if(mysqli_query($conecta,$eliminar)){
            echo "<script> alert('El medicamento fue eliminada del sistema')</script>";
        }else{
            echo "<script> alert('El medicamento no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
        }
    }


    function eliminar_MedicamentoCirugiaTotal(){
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $eliminar="DELETE FROM medicamento_cirugia WHERE FK_CodigoCirugia = '$this->FK_CodigoCirugia'";
        echo $eliminar;
        if(mysqli_query($conecta,$eliminar)){
            echo "<script> alert('El medicamento fue eliminada del sistema')</script>";
        }else{
            echo "<script> alert('El medicamento no se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
        }
    }
}
?>