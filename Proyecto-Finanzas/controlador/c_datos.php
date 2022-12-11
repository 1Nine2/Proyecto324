<?php
    include("../controlador/seguridad.php");
    $id = $_SESSION['id'];
    $nom = $_SESSION['nombre'];
    $nomPers=$_POST['nomPers'];
    $rzPers=$_POST['rzPers'];
    $montoPers=$_POST['montoPers'];
    $fechaIni=date("Y-m-d H:i:s");
    $_SESSION['fecha']= $fechaIni;
    
    //echo "".$nomPers.' '.$rzPers.' '.$docPers.' '.$fechaIni.' '. $estado;
        include("../modelo/procesoClase.php");
        $pro = new Proceso ("",$id,$rzPers,$montoPers,"",$fechaIni,"");
        $res2=$pro->grabarProceso();
        if($res2){
            echo "<script>
                    alert('Se registro correctamente');
                    location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                </script>";
        }
        else{
            echo "<script>
                    alert('NO Se registro correctamente, ERROR');
                    location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                </script>";

        }   
    
?>