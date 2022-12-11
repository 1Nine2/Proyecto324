<?php
echo 'entramos';
session_start();
session_destroy();
header("location: ../vista/login.php");
?>