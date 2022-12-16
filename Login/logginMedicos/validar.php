<?php
ob_start();
include "../../Conexion/conexion.php";


$clas = new Conexion();
$conecta = $clas->conectarServidor();
$Documento_Medico = $_POST['Documento_Medico'];
$Contrasena_Medico = $_POST['Contrasena_Medico'];
session_start();
$_SESSION['Documento_Medico'] = $Documento_Medico;
$consulta = "SELECT * FROM medico WHERE Documento_Medico = '$Documento_Medico' AND Contrasena_Medico = '$Contrasena_Medico'";
$resultado = mysqli_query($conecta, $consulta);

// 1 = medico
// 2 = Adm


$filas=mysqli_num_rows($resultado);
if ($filas) {
header("location:../../Vista/desk.php?DocM=".urldecode($Documento_Medico));

}else {
?>

    <?php include("login.php");
    echo "<script> alert('Documento o Contraseña incorrecta')</script>"; ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conecta);
?>

