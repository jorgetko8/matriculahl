<?php

class Alumno{
    
    private $id;
    private $persona_dni;
    private $db;
    
    function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getPersona_dni() {
        return $this->persona_dni;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPersona_dni($persona_dni) {
        $this->persona_dni = $persona_dni;
    }


    
    
}