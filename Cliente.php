<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumeto;
    private $dni;

    public function __construct($nombre,$apellido,$estado,$tipoDocumeto,$dni)
    {
        $this-> nombre=$nombre;
        $this-> apellido=$apellido;
        $this-> estado=$estado;
        $this-> tipoDocumeto=$tipoDocumeto;
        $this-> dni=$dni;
        
    }
    //GETTER Y SETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function getTipoDoc(){
        return $this->tipoDocumeto;
    }
    public function setTipoDoc($tipo){
        $this->tipoDocumeto=$tipo;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function __toString()
    {
        return "\n *Nombre: ".$this->getNombre()."\n".
               " *Apellido: ".$this->getApellido()."\n".
               " *Estado: ".($this->getEstado() ? "SI":"NO")."\n". //operador ternario Ejemplo:  (condition) ? (true_expression) : (false_expression);
               " *Tipo documento: ".$this->getTipoDoc()."\n".
               " *DNI: ".$this->getDni();
    }
}