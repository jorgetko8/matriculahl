<?php

class Estudiante_domicilio{
    
    private $id;
    private $estudiante_doc;
    private $direccion;
    private $lugar;
    private $departamento;
    private $provincia;
    private $distrito;
    private $telefono;
    private $db;
    
    public function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getEstudiante_doc() {
        return $this->estudiante_doc;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstudiante_doc($estudiante_doc) {
        $this->estudiante_doc = $estudiante_doc;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    
    
}
