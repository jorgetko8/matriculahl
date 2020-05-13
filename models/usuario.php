<?php

class Usuario{
    
    private $id;
    private $persona_dni;
    private $usuario;
    private $password;
    private $privilegio;
    private $estado;
    private $db;
    
    function __construct() {
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getPersona_dni() {
        return $this->persona_dni;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getPrivilegio() {
        return $this->privilegio;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPersona_dni($persona_dni) {
        $this->persona_dni = $persona_dni;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPrivilegio($privilegio) {
        $this->privilegio = $privilegio;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public function registrarUsuario(){
        
        $sql = "INSERT INTO usuarios VALUES(null, {$this->getPersona_dni()}, '{$this->getUsuario()}', '{$this->getPassword()}', {$this->getPrivilegio()}, {$this->getEstado()});";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        
        return $result;
    }
    
    
}