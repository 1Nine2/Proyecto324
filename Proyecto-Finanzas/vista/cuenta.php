<?php
include("../vista/adminVistaGeneral.php")
?>
<body>

    <div class='row'>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h1>Elije la cuenta y la accion que deseas realizar</h1>
        <form role="form" method ="post" enctype="multipart/form-data" action="../controlador/<?php echo "c_".$pantalla ?>">
        <label for="">Cuenta</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cuentaPers">
        <?php
        $idPers=$_SESSION['id'];
        include("../modelo/conexion.php");
        $sql = $conexion->query("select * from cuenta where idPersona = $idPers");
        while ($datos=mysqli_fetch_array($sql)) {
        ?>
            <option value="<?php echo $datos['nroCuenta']?>"><?php echo $datos['nroCuenta']?></option>
        <?php
        }
        ?>
        </select>
            <br>
        
        <label for="">Accion</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="accionPers">
        <option selected>---</option>
        <option value="Deposito">Deposito</option>
        <option value="Retiro">Retiro</option>

        </select>

            <br>
            <input type="submit" value="Registrar" class='btn btn-primary'>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</body>
<?php
require_once "footerDash.php";
?>