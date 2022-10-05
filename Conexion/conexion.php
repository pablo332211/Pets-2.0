<?php

class Conexion{
    private $servername= "localhost";
    private $username="root";
    private $password="pablo";
    private $database="pets++";

    function conectarServidor(){
        $con = mysqli_connect($this->servername,$this->username, $this->password, $this->database) or die("Error al conectarse con el Servidor");
        return $con;
    }
}

$obj = new Conexion();
if($obj->conectarServidor()){
    echo "Conectado";
}

?>
