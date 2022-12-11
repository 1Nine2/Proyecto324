<?php
class Proceso{
    private $id;
    private $id_persona;
    private $razon;
    private $monto;
    private $nroCuenta;
    private $fechaIni;
    private $accion;
    public function __construct($i,$idp,$razon,$m,$nr,$fi,$ac){
        $this->id=$i;
        $this->id_persona=$idp;
        $this->razon=$razon;
        $this->monto=$m;
        $this->nroCuenta=$nr;
        $this->fechaIni=$fi;
        $this->accion=$ac;
    }
    public function grabarProceso(){
        include("conexion.php");
        $consulta = $conexion->query("insert into proceso_deposito(id_persona,razon,monto,nroCuenta,fechaIni,accion)
        values('$this->id_persona','$this->razon','$this->monto','$this->nroCuenta','$this->fechaIni','$this->accion')");
        return ($consulta);
    }
    public function actualizarProceso(){
        include("conexion.php");
        $consulta = $conexion->query("update proceso_deposito set nroCuenta='$this->nroCuenta', accion='$this->accion' where id_persona='$this->id_persona' and fechaIni='$this->fechaIni'");
        return ($consulta);
    }
    public function montoProceso(){
        include("conexion.php");
        $consulta = $conexion->query("select * from proceso_deposito where nroCuenta='$this->nroCuenta' and accion='$this->accion' and  id_persona='$this->id_persona' and fechaIni='$this->fechaIni'");
        return ($consulta);
    }
    public function retiroProceso($monto){
        include("conexion.php");
        $consulta = $conexion->query("update cuenta set saldo=saldo-$monto where idPersona='$this->id_persona' and nroCuenta='$this->nroCuenta'");
        return ($consulta);
    }
    public function depositoProceso($monto){
        include("conexion.php");
        $consulta = $conexion->query("update cuenta set saldo=saldo+$monto where idPersona='$this->id_persona' and nroCuenta='$this->nroCuenta'");
        return ($consulta);
    }
    
}
?>