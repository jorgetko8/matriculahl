<?php

require_once 'models/administrativo.php';
require_once 'models/usuario.php';

class UsuarioController{
    
    public function index(){
        
        echo "Controlador Usuario, Accion index()";
        
    }
    
    public function login(){
        
        require_once 'views/usuario/login.php';
    }
    
}