<?php

class Administrativo {

    private $documento_identidad;
    private $tipo_documento;
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $correo;
    private $celular;
    private $fecha_nac;
    private $usuario;
    private $password;
    private $privilegio;
    private $estado;
    private $foto;
    private $db;

    public function __construct() {
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

    public function registrarAdministrativo() {

        $sql = "INSERT INTO administrativos VALUES('{$this->getDocumento_identidad()}', '{$this->getTipo_documento()}', '{$this->getNombres()}', "
                . "'{$this->getApe_paterno()}', '{$this->getApe_materno()}', '{$this->getCorreo()}', '{$this->getCelular()}', '{$this->getFecha_nac()}', CURDATE(), "
                . "'{$this->getUsuario()}', '{$this->getPassword()}', {$this->getPrivilegio()}, {$this->getEstado()}, '{$this->getFoto()}');";

        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function obtenerLista() {

        $sql = "SELECT * FROM administrativos ORDER BY fecha_reg ASC;";
        $lista = $this->db->query($sql);

        return $lista;
    }


    public function adminById(){
        $sql = "SELECT * FROM administrativos WHERE documento_identidad='{$this->getDocumento_identidad()}'";
        $reg = $this->db->query($sql);

        return $reg;
    }

    public function logearAdmin() {

        $result = false;
        $usuario = $this->getUsuario();
        $password = $this->getPassword();

        $sql = "SELECT * FROM administrativos WHERE usuario = '$usuario'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            
            $admin = $login->fetch_object();
            $hash = $admin->password;
            
            $verify = password_verify($password, $hash);
            if ($verify) {
                $result = $admin;
            }
        }

        return $result;
    }

    public function modificarAdministrativo(){
        $sql = "UPDATE administrativos SET nombres='{$this->getNombres()}', ape_paterno='{$this->getApe_paterno()}', ape_materno='{$this->getApe_materno()}', correo='{$this->getCorreo()}', fecha_nac='{$this->fecha_nac}', estado={$this->getEstado()} WHERE documento_identidad='{$this->getDocumento_identidad()}';";

        $query = $this->db->query($sql);
        
        $result = false;
        if($query){
            $result = true;
        }
        return $result;
    }

}
