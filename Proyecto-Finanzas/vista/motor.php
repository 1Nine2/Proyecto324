<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <!-- ESTILOS CARRITO -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

</head>
<?php
include("../controlador/seguridad.php");

include("../modelo/conexion.php");
$flujo=$_GET['flujo'];
$proceso=$_GET['proceso'];
$_SESSION['flujo']=$flujo;
$_SESSION['proceso']=$proceso;
$flujoSql=$conexion->query("select * from flujo where flujo='$flujo' and proceso='$proceso'");
$flujoData=mysqli_fetch_array($flujoSql);
$pantalla=$flujoData['pantalla'];
$tipo=$flujoData['tipo'];
$siguiente=$flujoData['procesoSig'];

$flujoSql2=$conexion->query("select * from flujo where flujo='$flujo' and procesoSig='$proceso'");
if(($flujoSql2->num_rows)>0){
    $flujoData2=mysqli_fetch_array($flujoSql2);
    $anterior=$flujoData2['proceso'];
}
if(isset($_GET['idProceso'])){
    $idProceso=$_GET['idProceso'];
    $_SESSION['idProceso']=$idProceso;
}
if(isset($_GET['pagAnterior'])){
    $anterior=$_GET['pagAnterior'];
}
include($pantalla)

?>
<center>
<?php
if(isset($anterior)){
?>
    <a href = "../vista/motor.php?flujo=<?php echo $flujo;?>&proceso=<?php echo $anterior;?>" class='btn btn-warning'>Anterior</a>
<?php
}
?>
<?php
if(isset($siguiente)and $siguiente !="C"){
?>
    <a href = "../vista/motor.php?flujo=<?php echo $flujo;?>&proceso=<?php echo $siguiente;?>" class='btn btn-warning'>Siguiente</a>
<?php
}
?>
</center>