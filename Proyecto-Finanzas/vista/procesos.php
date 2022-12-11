<?php
include("../vista/adminVistaGeneral.php")
?>
<?php
            include('../modelo/conexion.php');
            $id=$_SESSION['id'];
            $resc=$conexion->query("select * from cuenta where idPersona=$id ");
                while($regc=mysqli_fetch_array($resc)){
                    $cuenta= $regc[0];
?>
<div class='row'>
    <div class="col-md-1"></div>
    <div class="col-md-9">
        <h1>HISTORIAL DE PROCESOS <?php echo "Nro Cuenta ".$cuenta;?></h1>
        <h1>SALDO: <?php echo $regc[1 ];?></h1>
        <table class='table'>
            <thead class='table-info'>
                <tr>
                    <th scope='col'>RAZON</th>
                    <th scope='col'>MONTO</th>
                    <th scope='col'>NRO CUENTA</th>
                    <th scope='col'>FECHA INI</th>
                    <th scope='col'>ACCION</th>
          
                </tr>
            </thead>
            <img src="" alt="">
            <tbody>
            <?php
            include('../modelo/conexion.php');
            $id=$_SESSION['id'];
            $res=$conexion->query("select * from proceso_deposito where id_persona=$id and nroCuenta=$cuenta");
                while($reg=mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>". $reg['razon']."</td>";
                    echo "<td>". $reg['monto']."</td>";
                    echo "<td>". $reg['nroCuenta']."</td>";
                    echo "<td>". $reg['fechaIni']."</td>";
                    echo "<td>". $reg['accion']."</td>";
                   
                    echo "</tr>";
                }
            ?>
                
            </tbody>
        </table>
        
    </div>
    <div class="col-md-2"></div>
    </div>
<?php
                }
?>



<?php

require_once "footerDash.php";
?>