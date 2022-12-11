<?php
include("../vista/adminVistaGeneral.php")
?>
<body>

    <div class='row'>
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <h1>Llenado de Datos</h1>
        <form role="form" method ="post" enctype="multipart/form-data" action="../controlador/<?php echo "c_".$pantalla ?>">
            <label for="">Nombre</label>
            <input type="text" name="nomPers" id="nomPers" class='form-control' value=<?php echo $nom; ?> readonly>
            <br>
            <label for="">Razon</label>
            <input type="text" name="rzPers" id="rzPers" class='form-control'>
            <br>
            <label for="">Monto</label>
            <input type="number" name="montoPers" id="montoPers" class='form-control'>
            <br>
            
            <input type="submit" name="registrarCliente" value="Registrar" class='btn btn-primary'>
        </form>
    </div>
    <div class="col-md-3"></div>
    </div>
</body>
<?php
require_once "footerDash.php";
?>