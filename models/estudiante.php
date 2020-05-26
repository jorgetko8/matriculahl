<?php

class Estudiante{
    
    private $documento_identidad;
    private $tipo_documento;
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $sexo;
    private $fecha_nac;
    private $religion;
    private $pais;
    private $departamento;
    private $provincia;
    private $distrito;
    private $discapacidad;
    private $tipo_discapacidad;
    private $usuario;
    private $password;
    private $privilegio;
    private $estado;
    private $foto;
    private $correo;
    private $direcciondom;
    private $lugardom;
    private $departamentodom;
    private $provinciadom;
    private $distritodom;
    private $telefonodom;
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

    function getSexo() {
        return $this->sexo;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getReligion() {
        return $this->religion;
    }

    function getPais() {
        return $this->pais;
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

    function getDiscapacidad() {
        return $this->discapacidad;
    }

    function getTipo_discapacidad() {
        return $this->tipo_discapacidad;
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

    function getCorreo(){
        return $this->correo;
    }

    function getDirecciondom(){
        return $this->direcciondom;
    }

    function getLugardom(){
        return $this->lugardom;
    }

    function getDepartamentodom(){
        return $this->departamentodom;
    }

    function getProvinciadom(){
        return $this->provinciadom;
    }

    function getDistritodom(){
        return $this->distritodom;
    }

    function getTelefonodom(){
        return $this->telefonodom;
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

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setReligion($religion) {
        $this->religion = $religion;
    }

    function setPais($pais) {
        $this->pais = $pais;
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

    function setDiscapacidad($discapacidad) {
        $this->discapacidad = $discapacidad;
    }

    function setTipo_discapacidad($tipo_discapacidad) {
        $this->tipo_discapacidad = $tipo_discapacidad;
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

    function setCorreo($correo){
        $this->correo = $correo;
    }

    function setDirecciondom($direcciondom){
        $this->direcciondom = $direcciondom;
    }

    function setLugardom($lugardom){
        $this->lugardom = $lugardom;
    }

    function setDepartamentodom($departamentodom){
        $this->departamentodom = $departamentodom;
    }

    function setProvinciadom($provinciadom){
        $this->provinciadom = $provinciadom;
    }

    function setDistritodom($distritodom){
        $this->distritodom = $distritodom;
    }

    function setTelefonodom($telefono){
        $this->telefonodom = $telefono;
    }



    public function registrarEstudiante(){

        $sql = "INSERT INTO estudiantes VALUES('{$this->getDocumento_identidad()}', '{$this->getTipo_documento()}', '{$this->getNombres()}', '{$this->getApe_paterno()}', '{$this->getApe_materno()}', '{$this->getSexo()}', '{$this->getFecha_nac()}', '{$this->getReligion()}', '{$this->getPais()}', '{$this->getDepartamento()}', '{$this->getProvincia()}', '{$this->getDistrito()}', '{$this->getDiscapacidad()}', '{$this->getTipo_discapacidad()}', CURDATE(),'{$this->getCorreo()}' ,'{$this->getUsuario()}', '{$this->getPassword()}', {$this->getPrivilegio()}, {$this->getEstado()}, '{$this->getFoto()}', '{$this->getDirecciondom()}', '{$this->getLugardom()}', '{$this->getDepartamentodom()}', '{$this->getProvinciadom()}', '{$this->getDistritodom()}', '{$this->getTelefonodom()}');";

        $insert =  $this->db->query($sql);
   
        $result = false;

        if($insert){
            $result = true;
        }

        return $result;

    }

    public function actualizarEstudiante(){

        $sql = "UPDATE estudiantes SET nombres='{$this->getNombres()}', ape_paterno='{$this->getApe_paterno()}', ape_materno='{$this->getApe_materno()}', sexo='{$this->getSexo()}', fecha_nac='{$this->getFecha_nac()}', religion='{$this->getReligion()}', pais='{$this->getPais()}', departamento='{$this->getDepartamento()}', provincia='{$this->getProvincia()}', distrito='{$this->getDistrito()}', discapacidad='{$this->getDiscapacidad()}', tipo_discapacidad='{$this->getTipo_discapacidad()}', direcciondom='{$this->getDirecciondom()}', lugardom='{$this->getLugardom()}', departamentodom='{$this->getDepartamentodom()}', provinciadom='{$this->getProvinciadom()}', distritodom='{$this->getDistritodom()}', telefonodom='{$this->getTelefonodom()}';";

        $query = $this->db->query($sql);

        $result = false;

        if($query){
            $result = true;
        }

        return $result;

    }

    public function obtenerLista(){

        $sql = "SELECT * FROM estudiantes";

        $query = $this->db->query($sql);

        $result = false;
        if($query){
            $result = $query;
        }

        return $result;

    }

    public function estudianteById(){

        $sql = "SELECT * FROM estudiantes WHERE documento_identidad='{$this->getDocumento_identidad()}';";

        $query = $this->db->query($sql);

        $result = false;

        if($query){
            $result = $query;
        }

        return $result;

    }
    
}