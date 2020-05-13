<?php


class Persona{
    
    private $dni;
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $direccion;
    private $distrito;
    private $fecha_nac;
    private $tipo;
    private $db;
    
    public function __construct() {
        $this->db = Database::conexion();
    }
    
    function getDni() {
        return $this->dni;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApe_paterno() {
        return $this->ape_paterno;
    }

    function getApe_materno() {
        return $this->ape_materno;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApe_paterno($ape_paterno) {
        $this->ape_paterno = $ape_paterno;
    }

    function setApe_materno($ape_materno) {
        $this->ape_materno = $ape_materno;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function registrarPersona(){
        
        $sql = "INSERT INTO personas VALUES({$this->getDni()}, '{$this->getNombres()}', '{$this->getApe_paterno()}', "
        . "'{$this->getApe_materno()}', '{$this->getDireccion()}', '{$this->getDistrito()}', '{$this->getFecha_nac()}', '{$this->getTipo()}');";
        
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
}