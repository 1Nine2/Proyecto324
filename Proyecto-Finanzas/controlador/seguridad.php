<?php
session_start();
if (empty($_SESSION['id'])) {
    echo "<script>alert('Acceso denegado');
    location.href = '../controlador/login.php'
    </script>";
    //header("location: ../controlador/login.php");
}
?>