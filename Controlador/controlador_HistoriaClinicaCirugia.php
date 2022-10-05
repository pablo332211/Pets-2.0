<?php 

class historiaClinica_Cirugia{
    public $FK_CodigoHistoriaClinica;
    public $FK_CodigoCirugia;


    function agregar_HistoriaClinicaCirugia(){
        $clas= new Conexion();
        $conecta = $clas->conectarServidor();
        $query = "SELECT Codigo_Cirugia FROM cirugia ORDER BY Codigo_Cirugia DESC LIMIT 1";
        $resultado = mysqli_query($conecta, $query);
        $arreglo = mysqli_fetch_row($resultado);
        $this->FK_CodigoCirugia = $arreglo[0];

        $clas= new Conexion();
        $conecta = $clas->conectarServidor();
        $insertar = "INSERT INTO historiaclinica_cirugia (FK_CodigoHistoriaClinica, FK_CodigoCirugia) 
                                                    VALUE('$this->FK_CodigoHistoriaClinica', '$this->FK_CodigoCirugia') ";
        echo $insertar;
        mysqli_query($conecta,$insertar);
    }

    function eliminar_HistoriaClinicaCirugia(){
        $clas= new Conexion();
        $conecta = $clas->conectarServidor();
        $eliminar = "DELETE FROM historiaclinica_cirugia WHERE FK_CodigoHistoriaClinica = '$this->FK_CodigoHistoriaClinica' AND FK_CodigoCirugia = '$this->FK_CodigoCirugia' ";
        mysqli_query($conecta,$eliminar);
        echo $eliminar;
    }


}












?>