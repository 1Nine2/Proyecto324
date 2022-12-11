<?php
    include("../controlador/seguridad.php");
    $id = $_SESSION['id'];
    $cuentaPers = $_POST['cuentaPers'];
    $accionPers = $_POST['accionPers'];
    $fechaIni=$_SESSION['fecha'];
    //echo "".$nomPers.' '.$ciPers.' '.$docPers.' '.$fechaIni.' '. $estado;
        include("../modelo/procesoClase.php");
        $pro = new Proceso ("",$id,"","",$cuentaPers,$fechaIni,$accionPers);
        $res2=$pro->actualizarProceso();
        $montosql=$pro->montoProceso();
        $monto = mysqli_fetch_array($montosql);
        if($accionPers=="Retiro"){
            $res3=$pro->retiroProceso($monto[3]);
        }
        else if($accionPers=="Deposito"){
            $res3=$pro->depositoProceso($monto[3]);

        }
        if($res2){
            echo "<script>
                    alert('Se registro correctamente');
                    location.href = '../vista/motor.php?flujo=F1&proceso=P2';
                </script>";
        }
            else{
                echo "<script>
                        alert('NO Se registro correctamente, ERROR');
                        location.href = '../vista/motor.php?flujo=F1&proceso=P1';
                    </script>";

            }   
    
?>