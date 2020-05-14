<?php

class Apoderados{
    
    private $documento_identidad;
    private $tipo_documento;
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $fecha_nac;
    private $grado_instruccion;
    private $ocupacion;
    private $vive_con_estudiante;
    private $religion;
    private $coreo;
    private $celular;
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

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getGrado_instruccion() {
        return $this->grado_instruccion;
    }

    function getOcupacion() {
        return $this->ocupacion;
    }

    function getVive_con_estudiante() {
        return $this->vive_con_estudiante;
    }

    function getReligion() {
        return $this->religion;
    }

    function getCoreo() {
        return $this->coreo;
    }

    function getCelular() {
        return $this->celular;
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

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setGrado_instruccion($grado_instruccion) {
        $this->grado_instruccion = $grado_instruccion;
    }

    function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;
    }

    function setVive_con_estudiante($vive_con_estudiante) {
        $this->vive_con_estudiante = $vive_con_estudiante;
    }

    function setReligion($religion) {
        $this->religion = $religion;
    }

    function setCoreo($coreo) {
        $this->coreo = $coreo;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }
    
    
    
}