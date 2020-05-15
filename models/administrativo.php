<?php

class Administrativo{
    
    private $documento_identidad;
    private $tipo_documento;
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $correo;
    private $celular;
    private $fecha_nac;
    private $db;
    
    public function __construct(){
        $this->db = Database::conexion();
    }
    
    function getDocumento_identidad() {
        return $this->documento_identidad;
    }

    function getTipo_documento() {
        return $this->tipo_documento;
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

    function getCorreo() {
        return $this->correo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function setDocumento_identidad($documento_identidad) {
        $this->documento_identidad = $documento_identidad;
    }

    function setTipo_documento($tipo_documento) {
        $this->tipo_documento = $tipo_documento;
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

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    public function registrarAdministrativo(){
        
        $sql = "INSERT INTO administrativos VALUES('{$this->getDocumento_identidad()}', '{$this->getTipo_documento()}', '{$this->getNombres()}', "
        . "'{$this->getApe_paterno()}', '{$this->getApe_materno()}', '{$this->getCorreo()}', '{$this->getCelular()}', '{$this->getFecha_nac()}');";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
}