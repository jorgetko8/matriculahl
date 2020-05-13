<?php

require_once 'models/persona.php';
require_once 'models/administrativo.php';
require_once 'models/usuario.php';

class UsuarioController{
    
    public function index(){
        
        echo "Controlador Usuario, Accion index()";
        
    }
    
    public function login(){
        
        require_once 'views/usuario/login.php';
    }
    
    public function registro(){
        
        require_once 'views/usuario/registro.php';
        
    }
    
    public function registrar(){
        
        
        $nombres = isset($_POST['nombres'])? $_POST['nombres'] : false;
        $ape_paterno = isset($_POST['apepaterno'])? $_POST['apepaterno'] : false;
        $ape_materno = isset($_POST['apematerno'])? $_POST['apematerno'] : false;
        $dni = isset($_POST['dni'])? $_POST['dni'] : false;
        $direccion = isset($_POST['direccion'])? $_POST['direccion'] : false;
        $distrito = isset($_POST['distrito'])? $_POST['distrito'] : false;
        $celular = isset($_POST['celular'])? $_POST['celular'] : false;
        $correo = isset($_POST['correo'])? $_POST['correo'] : false;
        
        $fecha_nac_original = isset($_POST['fechanac'])? $_POST['fechanac'] : false;
        
        
        if($nombres && $ape_paterno && $ape_materno && $dni && $direccion && $distrito && $celular && $correo && $fecha_nac_original){
            
            $fecha_nac = date("Y-m-d", strtotime($fecha_nac_original));
            $tipo = "administrativo";
            $usuario = "a".$dni;
            
            $yearnac = date("Y", strtotime($fecha_nac_original));

            $password = $yearnac."".$yearnac;
            $privilegio = 2;
            
            $persona = new Persona();
            $persona->setDni($dni);
            $persona->setNombres($nombres);
            $persona->setApe_paterno($ape_paterno);
            $persona->setApe_materno($ape_materno);
            $persona->setDireccion($direccion);
            $persona->setDistrito($distrito);
            $persona->setFecha_nac($fecha_nac);
            $persona->setTipo($tipo);
            $registrarPersona = $persona->registrarPersona();
            
            if($registrarPersona){
                return true;
            }
        }
        
        header("Location:".base_url.'usuario/registro');
    }
    
}