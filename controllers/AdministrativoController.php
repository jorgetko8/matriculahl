<?php

class AdministrativoController{
    
    public function index(){
        
        require_once 'views/administrativo/menu.php';
    }
    
    public function registro(){
        
        require_once 'views/administrativo/registro.php';
        
    }
    
    public function registrar(){
        
        
        $nombres = isset($_POST['nombres'])? $_POST['nombres'] : false;
        $ape_paterno = isset($_POST['apepaterno'])? $_POST['apepaterno'] : false;
        $ape_materno = isset($_POST['apematerno'])? $_POST['apematerno'] : false;
        $tipo_documento = isset($_POST['tipo_documento'])? $_POST['tipo_documento'] : false;
        $documento_identidad = isset($_POST['documento_identidad'])? $_POST['documento_identidad'] : false;
        $celular = isset($_POST['celular'])? $_POST['celular'] : false;
        $correo = isset($_POST['correo'])? $_POST['correo'] : false;
        
        
        if($nombres && $ape_paterno && $ape_materno && $tipo_documento && $documento_identidad && $celular && $correo){
            
            $usuario_documento_identidad = $documento_identidad;
            $usuario = $documento_identidad;
            
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
        
        header("Location:".base_url.'administrativo/registro');
    }
}