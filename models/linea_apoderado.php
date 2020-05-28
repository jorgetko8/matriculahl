<?php

class Linea_apoderado{
    
    private $id;
    private $apoderado_doc;
    private $estudiante_doc;
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

    function getEstudiante_doc() {
        return $this->estudiante_doc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setApoderado_doc($apoderado_doc) {
        $this->apoderado_doc = $apoderado_doc;
    }

    function setEstudiante_doc($estudiante_doc) {
        $this->estudiante_doc = $estudiante_doc;
    }

    public function registrarLinea(){

        $sql = "INSERT INTO lineas_apoderados VALUES(null, '{$this->getApoderado_doc()}', '{$this->getEstudiante_doc()}');";

        $query = $this->db->query($sql);
        
        $result = false;

        if($query){
            $result = true;
        }

        return $result;

    }
    
    
    
}