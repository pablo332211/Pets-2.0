<?php

class historia_clinica{
    public $Codigo_HistoriaClinica;
    public $FK_DocumentoMedico;
    public $FK_CodigoMascota;


    function agregar_HistoriaClinica(){
            $clas= new Conexion();
            $conecta = $clas->conectarServidor();
            $query = "SELECT Codigo_Mascota FROM mascota ORDER BY Codigo_Mascota DESC LIMIT 1";
            $resultado = mysqli_query($conecta, $query);
            $arreglo = mysqli_fetch_row($resultado);
            $this->FK_CodigoMascota = $arreglo[0];

            ?>
                <script> 
                        if(window.confirm("Desea Crear una HISTORIA CLINICA a la Mascota?")){
                            <?php
                                $insertar = "INSERT INTO historia_clinica (Codigo_HistoriaClinica, FK_DocumentoMedico, FK_CodigoMascota)  VALUES (NULL, '$this->FK_DocumentoMedico', '$this->FK_CodigoMascota') ";
                                mysqli_query($conecta,$insertar);
                            ?>
                            alert("Historia Clinica creada con EXITO");
                        }
                </script>
            <?php
    }

    function eliminar_HistoriaClinica(){
        $clas = new Conexion();
        $conecta = $clas->conectarServidor();
        $eliminar = "DELETE FROM historia_clinica WHERE Codigo_HistoriaClinica = '$this->Codigo_HistoriaClinica'";
        mysqli_query($conecta,$eliminar);
        echo $eliminar;
    }
}
?>