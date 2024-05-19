<?php
class MotoNacional extends Moto{
    private $porcentajeDescuento;

    public function __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa)
    {
        parent:: __construct($codigo,$costo,$anio,$descripcion,$porcentaje,$activa);
        $this->porcentajeDescuento = 15;
    }

    public function getDescuento(){
        return $this->porcentajeDescuento;
    }
    public function setDescuento($porcentaje){
        $this->porcentajeDescuento = $porcentaje;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena.= $this->getDescuento();
        return $cadena;
    }

    // Calcula el precio de venta de una moto
    /* Redefinir  el  método  darPrecioVenta  para  que  en  el  caso  de  las  motos  
    nacionales  aplique  el  porcentaje  de  descuento sobre  el  valor  calculado  
    inicialmente */
    public function darPrecioVenta(){
        $precio = parent::darPrecioVenta();
        $precioVenta = $precio;
        if($precio != -1){
            $porcentajeDescuento = $this->getDescuento()/100;
            $precioVenta = $precio - ($precio * $porcentajeDescuento);
        }
        return $precioVenta;
    }
}