<?php
class MotoNacional extends Moto{
    private $porcentajeDescuento;

    public function __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa,$descuento)
    {
        parent:: __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa);
        $this->porcentajeDescuento = $descuento ?? 15; //si $descuento no tiene ningun valor se va a utilizar el 15
    }

    // GETTERS Y SETTERS
    public function getDescuento(){
        return $this->porcentajeDescuento;
    }
    public function setDescuento($porcentaje){
        $this->porcentajeDescuento = $porcentaje;
    }
    // toString
    public function __toString()
    {
        $cadena = parent::__toString()."\n";
        $cadena.= "-Descuento: ".$this->getDescuento()."\n";
        return $cadena;
    }

    // Calcula el precio de venta de una moto
    /* Redefinir  el  método  darPrecioVenta  para  que  en  el  caso  de  las  motos  
    nacionales  aplique  el  porcentaje  de  descuento sobre  el  valor  calculado  
    inicialmente */
    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        if($precioVenta != -1){
            $porcentajeDescuento = $precioVenta * ($this->getDescuento()/100);
            $precioVenta = $precioVenta -  $porcentajeDescuento;
        }
        return $precioVenta;
    }
}