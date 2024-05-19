<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;
   

    public function __construct($denominacion,$direccion,$colClientes,$colMotos,$colVentas)
    {
        $this-> denominacion=$denominacion;
        $this-> direccion=$direccion;
        $this-> colClientes=$colClientes;
        $this-> colMotos=$colMotos;
        $this-> colVentas=$colVentas;
    }
    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenomionacion($denominacion){
        $this->denominacion=$denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function getClientes(){
        return $this->colClientes;
    }
    public function setClientes($clientes){
        $this->colClientes=$clientes;
    }
    public function getMotos(){
        return $this->colMotos;
    }
    public function setMotos($colMotos){
        $this->colMotos=$colMotos;
    }
    public function getVentas(){
        return $this->colVentas;
    }
    public function setVentas($colVentas){
        $this->colVentas=$colVentas;
    }
    public function retornarCadena($coleccion){
        $cadena=" ";
        foreach($coleccion as $elemento){
            $cadena=$cadena." ".$elemento."\n";
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Denominacion: ".$this->getDenominacion()."\n".
               "Direccion: ".$this->getDireccion()."\n".
               "Coleccion Clientes: "."\n".$this->retornarCadena($this-> getClientes())."\n".
               "Coleccion Motos: "."\n".$this->retornarCadena($this->getMotos())."\n".
               "Coleccion Ventas: "."\n".$this->retornarCadena($this->getVentas());
    }

    // ESTO SOLO LA BUSCA LA MOTO Y LA GUARDA PARA RETORNARLAAA
    public function retornarMoto($codigoMoto){
        $colMotos=$this->getMotos();
        $laMoto=null;
        $motoEncontrada=false;
        $i=0;
        while($i<count($colMotos)  && !$motoEncontrada){
            if($colMotos[$i]->getCodigo()==$codigoMoto){
                $laMoto=$colMotos[$i];
                $motoEncontrada=true;
            }
            $i++;
        }
        return $laMoto;
    }
    //REGISTRA VENTAS DE MOTO
    public function registrarVenta($colCodigos,$objCliente){
        $precioFinal=0;
        $arrayMotos=[];
        $numVenta=count($this->getVentas());
        $colVentas=$this->getVentas();
        $fecha=date("Y");
        $nuevaVenta= new Venta($numVenta+1,$fecha,$objCliente,$arrayMotos,0);
        if($objCliente->getEstado()!=true){
            for($i=0;$i<count($colCodigos);$i++){
                $objMoto=$this->retornarMoto($colCodigos[$i]);
                if($objMoto!=null){ //TRADUCCION: si se encontro alguna moto con el codigo
                    $nuevaVenta->incorporarMoto($objMoto);
                    
                }
            }
            if($nuevaVenta->getMotos()>0){ //TRADUCCION:si la coleccion de motos del $objVenta vendi motos
                array_push($colVentas,$nuevaVenta);
                $this->setVentas($colVentas);
                $precioFinal=$nuevaVenta->getPrecioFinal();
            }
        }else{
            $precioFinal=-1;
        }
           
        return $precioFinal;
    }
   
    // RETORNA LA COLECCION DE VENTAS AL CLIENTE
    public function retornarVentaXCliente($tipo,$numDoc){
        $ventasACliente=[];
        $colVentas=$this->getVentas();
        foreach($colVentas as $venta){
            if($venta->getCliente()->getDni()==$numDoc && $venta->getCliente()->getTipoDoc()==$tipo){
                    array_push($ventasACliente,$venta);
            }
        }
        return $ventasACliente;
    }
    /* Implementar  el  método  informarSumaVentasNacionales()  que  recorre  la  
    colección  de  ventas  realizadas  por  la empresa y retorna el importe total de 
    ventas Nacionales realizadas por la empresa. */
    public function informarSumaVentasNacionales(){
        $colVentas = $this->getVentas();
        $importeTotalNacionales = 0;
        foreach($colVentas as $venta){
            $importeTotalNacionales += $venta->retornarTotalVentaNacional();
        }
        return $importeTotalNacionales;
    }
    /* Implementar  el  método  informarVentasImportadas()  que  recorre  la  colección  
    de  ventas  realizadas  por  la  empresa  y retorna  una  colección  de  ventas  de 
    motos  importadas.  Si  en  la  venta  al  menos  una  de  las  motos  es  importada  
    la venta debe ser informada. (*IMPORTANTE: invocar a los métodos  implementados en 
    la clase venta cuando crea necesario)  */
    public function informarVentasImportadas(){
        $colVentas = $this->getVentas();
        $ventasMotosImportadas = [];
        foreach($colVentas as $venta){
            if(count($venta->retornarMotosImportadas()) > 0){
                array_push($ventasMotosImportadas,$venta);
            }
        }
        return $ventasMotosImportadas;
    }
}