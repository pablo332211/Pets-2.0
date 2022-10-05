<?php 
class certificaciones{

    public $Codigo_Certificacion;
    public $FK_DocumentoPropietario;
    public $Tipo_Certificacion;
    public $Fecha_Certificacion;
    public $EntidadSolicitadora_Certificacion;
    public $Observacion_Certificacion;



function agregar_Certificacion(){
$clas = new conexion();
$conecta = $clas->conectarServidor();
$insetar = "INSERT INTO certificacion (FK_DocumentoPropietario, 
                                    Tipo_Certificacion, 
                                    Fecha_Certificacion,
                                    EntidadSolicitadora_Certificacion, 
                                    Observacion_Certificacion) VALUES (
                                    '$this->FK_DocumentoPropietario', 
                                    '$this->Tipo_Certificacion',
                                    '$this->Fecha_Certificacion', 
                                    '$this->EntidadSolicitadora_Certificacion', 
                                    '$this->Observacion_Certificacion')";

echo $insetar;

mysqli_query($conecta,$insetar);
echo"<script>
    alert(El CERTIFICADO ha sido anexado exitsamente')
</script>";

}

function modificarCertificacion(){
    $clas = new conexion();
    $conecta = $clas->conectarServidor();
    $consulta = "SELECT * FROM certificacion where Codigo_Certificacion = '$this->Codigo_Certificacion'";
    $resultado = mysqli_query($conecta, $consulta);
    if (!mysqli_fetch_array($resultado)) {
        echo "<script> alert('La CERTIFICACION ya existe en el sistema')</script>";
        }else{
            $modificar = "UPDATE certificacion SET Codigo_Certificacion = '$this->Codigo_Certificacion',
            Tipo_Certificacion = '$this->Tipo_Certificacion',
            Fecha_Certificacion = '$this->Fecha_Certificacion',
            EntidadSolicitadora_Certificacion = '$this->EntidadSolicitadora_Certificacion',
            Observacion_Certificacion = '$this->Observacion_Certificacion' WHERE Codigo_Certificacion = '$this->Codigo_Certificacion'";

                                             echo $modificar;
                                             mysqli_query($conecta,$modificar);                                    
                                             echo "<script> alert('La CERTIFICACAION Fue Modificada en el Sistema')</script>";
        
    }
}

function eliminarCertificacion(){
    $clas = new conexion();
    $conecta = $clas->conectarServidor();
    $eliminar = "DELETE FROM certificacion WHERE Codigo_Certificacion = '$this->Codigo_Certificacion'";
    echo $eliminar;
    if(mysqli_query($conecta,$eliminar)){
        echo "<script> alert('El CERTIFICADO ha sido eliminado')</script>";
    }else{
        echo "<script> alert('La CERTIFIFCADO No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
    }
}

    
}





















?>