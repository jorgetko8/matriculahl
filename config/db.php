<?php

class Database{
    
    public static function conexion(){
        
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "matriculahl";
        
        $db = new mysqli($server, $user, $password, $database);
        $db->query("SET NAMES 'utf8'");
        
        return $db;
        
    }
    
}