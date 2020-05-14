<?php

class Usuario{
    
    private $id;
    private $documento_identidad;
    private $usuario;
    private $password;
    private $privilegio;
    private $estado;
    private $foto;
    private $db;
    
    public function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getDocumento_identidad() {
        return $this->documento_identidad;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getPrivilegio() {
        return $this->privilegio;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFoto() {
        return $this->foto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDocumento_identidad($documento_identidad) {
        $this->documento_identidad = $documento_identidad;
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

    function setFoto($foto) {
        $this->foto = $foto;
    }
    
    
    
}