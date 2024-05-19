<?php
/* Para  el  caso  de  las  motos  importadas,  se  debe  almacenar  el  país  desde  el 
que  se  importa y  el  importe  correspondiente  a  los  impuestos  de  importación  que
la  empresa  paga  por  el  ingreso  al  país*/
class MotoImportada extends Moto{
    private $paisOrigen;
    private $importeImpuetos;

    public function __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa,$paisOrigen,$importeImpuetos)
    {
        parent::__construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa);
        $this->paisOrigen = $paisOrigen;
        $this->importeImpuetos = $importeImpuetos;
    }
    public function getPaisOrigen(){
        return $this->paisOrigen;
    }   
    public function setPaisOrigen($pais){
        $this->paisOrigen=$pais;
    }
    public function getImpuesto(){
        return $this->importeImpuetos;
    }   
    public function setImpuesto($impuesto){
        $this->importeImpuetos=$impuesto;
    }
    public function __toString()
    {
        $cadena= parent::__toString();
        $cadena.= $this->getPaisOrigen(); 
        $cadena.= $this->getImpuesto(); 
        return $cadena;
    }
    /* Para  el  caso  de  las  motos  importadas,  al  valor  calculado  
    se  debe  sumar  el impuesto  que  pagó  la  empresa  por  su  importación.  
    A  continuación  se  describe  el  método  darPrecioVenta  con  el objetivo  de  
    tener  presente  su  implementación  y  realizar  las  modificaciones  que  crea  
    necesarias  para  dar  soporte  al nuevo requerimiento. */
    public function darPrecioVenta(){
        $precio = parent::darPrecioVenta();
        $precioVenta = $precio;
        if($precio != -1){
            $impuesto = $this->getImpuesto()/100;
            $precioVenta = $precio + ($precio * $impuesto);
        }
        return $precioVenta;
    }
}