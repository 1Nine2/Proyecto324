<?php

$conexion = new mysqli("localhost","root","","proceso_financiero");
$conexion->set_charset("utf8");
/*server="localhost";
$usuario="root";
$contrasenia="";

try{
    $conexion = new PDO("mysql:host=$server;dbname=restaurante",$usuario,$contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
catch(PDOException $error){
    echo "Conexion erronea ".$error;
}*/
?>