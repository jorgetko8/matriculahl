<?php

class Administrativo{
    
    private $id;
    private $correo;
    private $celular;
    private $persona_dni;
    private $db;
    
    public function __construct() {
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getCelular() {
        return $this->celular;
    }

    function getPersona_dni() {
        return $this->persona_dni;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setPersona_dni($persona_dni) {
        $this->persona_dni = $persona_dni;
    }

    public function registrarAdministrativo(){
        
        $sql = "INSERT INTO administrativos VALUES({$this->getId()}, '{$this->getCorreo()}', '{$this->getCelular()}', {$this->getPersona_dni()});";
        
        $save = $this->db->query($sql);
        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
        
    }
    
}