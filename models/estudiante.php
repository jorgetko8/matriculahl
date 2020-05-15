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
    
    
    
}