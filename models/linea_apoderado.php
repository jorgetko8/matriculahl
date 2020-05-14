<?php

class Linea_apoderado{
    
    private $id;
    private $apoderado_doc;
    private $alumno_doc;
    private $db;
    
    function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getApoderado_doc() {
        return $this->apoderado_doc;
    }

    function getAlumno_doc() {
        return $this->alumno_doc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApoderado_doc($apoderado_doc) {
        $this->apoderado_doc = $apoderado_doc;
    }

    function setAlumno_doc($alumno_doc) {
        $this->alumno_doc = $alumno_doc;
    }
    
    
    
}