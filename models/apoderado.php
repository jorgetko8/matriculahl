<?php

class Apoderado{
    
    private $id;
    private $celular;
    private $correo;
    private $persona_dni;
    private $db;
    
    function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getCelular() {
        return $this->celular;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getPersona_dni() {
        return $this->persona_dni;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPersona_dni($persona_dni) {
        $this->persona_dni = $persona_dni;
    }


    
    
}