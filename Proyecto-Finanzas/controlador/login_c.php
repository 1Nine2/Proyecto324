<?php
session_start();
if(!empty($_POST["btnLogin"])){
    $user=$_POST["user"];
    $password=$_POST["password"];
    //echo $user.$password;
    include("../modelo/conexion.php");
    $sqlCliente=$conexion->query("select * from persona xp where xp.nombre='$user' and xp.password='$password' and xp.rol = 'cliente'");
    $sqlCajero=$conexion->query("select * from persona xp where xp.nombre='$user' and xp.password='$password' and xp.rol = 'cajero'");
    if ($datos=$sqlCliente->fetch_object()) {
        $_SESSION['id']=$datos->id;
        $_SESSION['nombre']=$datos->nombre;
        $rol=$datos->rol;
    }
    else if ($datos=$sqlCajero->fetch_object()) {
        $_SESSION['id']=$datos->id;
        $_SESSION['nombre']=$datos->nombre;
        $rol=$datos->rol;
    } 
    $flujoSql=$conexion->query("select * from flujo where rol='$rol' and tipo='I'");
    $flujoIni=mysqli_fetch_array($flujoSql);
    $flujo=$flujoIni['flujo'];
    $proceso=$flujoIni['proceso'];
    header("location: motor.php?flujo=$flujo&proceso=$proceso");
}
?>