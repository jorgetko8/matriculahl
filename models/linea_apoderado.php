<?php

class Linea_apoderado{
    
    private $id;
    private $apoderado_dni;
    private $alumno_dni;
    private $db;
    
    function __construct(){
        $this->db = Database::conexion();
    }
    
    function getId() {
        return $this->id;
    }

    function getApoderado_dni() {
        return $this->apoderado_dni;
    }

    function getAlumno_dni() {
        return $this->alumno_dni;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApoderado_dni($apoderado_dni) {
        $this->apoderado_dni = $apoderado_dni;
    }

    function setAlumno_dni($alumno_dni) {
        $this->alumno_dni = $alumno_dni;
    }

    

    
}