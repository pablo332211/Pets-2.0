<?php 
class cirugia{

public $Codigo_Cirugia;    
public $Fecha_Cirugia;
public $NombrePaciente_Cirugia;
public $Especie_Cirugia;
public $Raza_Cirugia;
public $Sexo_Cirugia;
public $Edad_Cirugia;
public $Peso_Cirugia;
public $TipoProcedimiento_Cirugia;
public $TipoAnestecia_Cirugia;
public $NombrePropietario_Cirugia;
public $Identificacion_Cirugia;
public $Direccion_Cirugia;
public $Celular_Cirugia;
public $PreQuirurgicos;
public $AutorizaCirugia_Cirugia;
public $Observacion_Cirugia;

function agregar_Cirugia(){
      $clas = new Conexion();
      $conecta = $clas->conectarServidor();
      $insertar = "INSERT INTO cirugia (Codigo_Cirugia,
                                     Fecha_Cirugia,
                                     NombrePaciente_Cirugia,
                                     Especie_Cirugia,
                                     Raza_Cirugia,
                                     Sexo_Cirugia,
                                     Edad_Cirugia, 
                                     Peso_Cirugia, 
                                     TipoProcedimiento_Cirugia, 
                                     TipoAnestecia_Cirugia, 
                                     NombrePropietario_Cirugia, 
                                     Identificacion_Cirugia, 
                                     Direccion_Cirugia, 
                                     Celular_Cirugia, 
                                     PreQuirurgicos, 
                                     AutorizaCirugia_Cirugia, 
                                     Observacion_Cirugia) VALUES
                                     (NULL,
                                     '$this->Fecha_Cirugia',
                                     '$this->NombrePaciente_Cirugia',
                                     '$this->Especie_Cirugia',
                                     '$this->Raza_Cirugia',
                                     '$this->Sexo_Cirugia',
                                     '$this->Edad_Cirugia', 
                                     '$this->Peso_Cirugia', 
                                     '$this->TipoProcedimiento_Cirugia', 
                                     '$this->TipoAnestecia_Cirugia', 
                                     '$this->NombrePropietario_Cirugia', 
                                     '$this->Identificacion_Cirugia', 
                                     '$this->Direccion_Cirugia', 
                                     '$this->Celular_Cirugia', 
                                     '$this->PreQuirurgicos', 
                                     '$this->AutorizaCirugia_Cirugia', 
                                     '$this->Observacion_Cirugia')"; 
    echo $insertar;
    mysqli_query($conecta,$insertar);
    echo "<script> alert('La cirugia Fue creada con exito')</script>";
}

function modificar_Cirugia(){
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $consulta = "SELECT * FROM cirugia WHERE Codigo_Cirugia = '$this->Codigo_Cirugia'";
    $resultado = mysqli_query($conecta, $consulta);
    if(!mysqli_fetch_array($resultado)){
        echo "<script> alert('La CIRUGIA ya existe en el Sistema')</script>";
    }else{
            $modificar = "UPDATE cirugia SET Codigo_Cirugia = '$this->Codigo_Cirugia',
                                            Fecha_Cirugia = '$this->Fecha_Cirugia',
                                            NombrePaciente_Cirugia = '$this->NombrePaciente_Cirugia',
                                            Especie_Cirugia = '$this->Especie_Cirugia',
                                            Raza_Cirugia = '$this->Raza_Cirugia',
                                            Sexo_Cirugia = '$this->Sexo_Cirugia',
                                            Edad_Cirugia = '$this->Edad_Cirugia', 
                                            Peso_Cirugia = '$this->Peso_Cirugia', 
                                            TipoProcedimiento_Cirugia = '$this->TipoProcedimiento_Cirugia', 
                                            TipoAnestecia_Cirugia = '$this->TipoAnestecia_Cirugia', 
                                            NombrePropietario_Cirugia = '$this->NombrePropietario_Cirugia', 
                                            Identificacion_Cirugia = '$this->Identificacion_Cirugia', 
                                            Direccion_Cirugia = '$this->Direccion_Cirugia', 
                                            Celular_Cirugia = '$this->Celular_Cirugia', 
                                            PreQuirurgicos = '$this->PreQuirurgicos', 
                                            AutorizaCirugia_Cirugia = '$this->AutorizaCirugia_Cirugia', 
                                            Observacion_Cirugia = '$this->Observacion_Cirugia'
                                            WHERE Codigo_Cirugia = '$this->Codigo_Cirugia'";
            echo $modificar;
            mysqli_query($conecta,$modificar);                                    
            echo "<script> alert('La CIRUGIA Fue Modificada en el Sistema')</script>";
    }
}

function eliminar_Cirugia(){
    $clas = new Conexion();
    $conecta = $clas->conectarServidor();
    $eliminar="DELETE FROM cirugia WHERE Codigo_Cirugia = '$this->Codigo_Cirugia'";
    echo $eliminar;
            if(mysqli_query($conecta,$eliminar)){
                echo "<script> alert('La CIRUGIA Fue Eliminado en el Sistema')</script>";
            }else{
                echo "<script> alert('La CIRUGIA No se puede Eliminar del Sistema, porque tiene registros relacionados')</script>";
            }

}


}
