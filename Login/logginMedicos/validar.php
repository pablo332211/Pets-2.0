<?php
include "../../Conexion/conexion.php";

$clas = new Conexion();
$conecta = $clas->conectarServidor();
$Documento_Medico = $_POST['Documento_Medico'];
$Contrasena_Medico = $_POST['Contrasena_Medico'];
session_start();
$_SESSION['Documento_Medico'] = $Documento_Medico;
$consulta = "SELECT Documento_Medico, Contrasena_Medico, FK_CodigoRoles FROM medico WHERE Documento_Medico  = '$Documento_Medico' AND Contrasena_Medico = '$Contrasena_Medico'";
echo $consulta;
$resultado = mysqli_query($conecta, $consulta);

// 1 = medico
// 2 = Adm





$filas = mysqli_fetch_row($resultado);

echo $FK_CodigoRoles;

$FK_CodigoRoles = $filas[2];

if ($FK_CodigoRoles == 2) {
    header("location:../../Vista/desk.php?DocM=".urldecode($Documento_Medico));

}else if($FK_CodigoRoles == 1){
    header("location:../../Login/administrador/vistasAdministrador/administradorDesk.php?DocM=".urldecode($Documento_Medico));
}



else {
?>

    <?php include("login.php");
    echo "<script> alert('Error al iniciar sesion')</script>"; ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conecta);

    ?>

