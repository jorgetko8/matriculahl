<?php

require_once 'models/administrativo.php';
require_once 'models/usuario.php';

class AdministrativoController{
    
    public function index(){
        
        require_once 'views/administrativo/menu.php';
    }
    
    public function login(){
        
        require_once 'views/administrativo/login.php';
    }
    
    public function registro(){
        
        $_SESSION['adm']['registro_adm'] = true;
        
        require_once 'views/administrativo/registro.php';
        
    }
    
    public function listado(){
        
        $administrativo = new Administrativo();
        $administrativos = $administrativo->obtenerLista();
        $_SESSION['adm']['listar_adm'] = true;
        
        require_once 'views/administrativo/lista.php';
    }
    
    public function registrar(){
        
        $db = Database::conexion();
        $nombres = isset($_POST['nombres'])? mysqli_real_escape_string($db, trim($_POST['nombres'])) : false;
        $ape_paterno = isset($_POST['ape_paterno'])? mysqli_real_escape_string($db, trim($_POST['ape_paterno'])) : false;
        $ape_materno = isset($_POST['ape_materno'])? mysqli_real_escape_string($db, trim($_POST['ape_materno'])) : false;
        $tipo_documento = isset($_POST['tipo_documento'])? mysqli_real_escape_string($db, trim($_POST['tipo_documento'])) : false;
        $documento_identidad = isset($_POST['documento_identidad'])? trim($_POST['documento_identidad']) : false;
        $celular = isset($_POST['celular'])? $_POST['celular'] : false;
        $correo = isset($_POST['correo'])? mysqli_real_escape_string($db, trim($_POST['correo'])) : false;
        $fecha_nac_original = isset($_POST['fecha_nac'])? mysqli_real_escape_string($db, trim($_POST['fecha_nac'])) : false;
        
        if(is_numeric($nombres) || preg_match("/[0-9]/", $nombres) || strlen($nombres)>50){
            $_SESSION['error']['nombre'] = "Ingrese valores validos en el campo nombres(max. 30 caracteres)";
        }elseif(!$nombres){
            $_SESSION['error']['nombre'] = "Rellene el campo Nombres";
        }
        
        if(is_numeric($ape_paterno) || preg_match("/[0-9]/", $ape_paterno) || strlen($ape_paterno)>20){
            $_SESSION['error']['ape_paterno'] = "Ingrese valores validos en el campo Apellido Paterno(max. 20 caracteres)";
        }elseif(!$ape_paterno){
            $_SESSION['error']['ape_paterno'] = "Rellene el campo Apellido Paterno";
        }
        
        if(is_numeric($ape_materno) || preg_match("/[0-9]/", $ape_materno) || strlen($ape_materno)>20){
            $_SESSION['error']['ape_materno'] = "Ingrese valores validos en el campo Apellido Materno(max. 20 caracteres)";
        }elseif(!$ape_materno){
            $_SESSION['error']['ape_materno'] = "Rellene el campo Apellido Materno";
        }
        
        if(!is_numeric($documento_identidad) || preg_match("/[a-zA-Z]/", $documento_identidad) || strlen($documento_identidad)>13){
            $_SESSION['error']['documento_identidad'] = "Ingrese un numero de documento valido";
        }elseif(!$documento_identidad){
            $_SESSION['error']['documento_identidad'] = "Rellene el campo Documento de identidad";
        }
        
        if(preg_match("/[a-zA-Z]/", $celular) || strlen($celular)>11){
            $_SESSION['error']['celular'] = "Ingrese un numero de celular valido";
        }elseif(!$celular){
            $_SESSION['error']['celular'] = "Rellene el campo celular";
        }
        
        if(preg_match("/[a-zA-Z]/", $fecha_nac_original) || strlen($fecha_nac_original)>10){
            $_SESSION['error']['fecha_nac_original'] = "Ingrese una fecha de nacimiento valida";
        }elseif(!$fecha_nac_original){
            $_SESSION['error']['fecha_nac_original'] = "Elija una fecha de nacimiento en el calendario";
        }
        
        if(!is_string($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL) || strlen($correo)>25){
            $_SESSION['error']['correo'] = "Ingrese un correo valido(max. 25 caracteres)";
        }elseif(!$correo){
            $_SESSION['error']['correo'] = "Rellene el campo Correo";
        }
        
        // Validar si hay algun error antes de guardar
        
        if(!isset($_SESSION['error']) || $_SESSION['error'] == 0){
            // Fecha de nac. (administrativo)
            $fecha_nac = date("Y-m-d", strtotime($fecha_nac_original));
            
            // Datos propios de usuario
            $usuario_documento_identidad = $documento_identidad;
            $usuario_nick = $documento_identidad;
            
            $yearnac = date("Y", strtotime($fecha_nac_original));
            $password_sin_enc = $yearnac."".$yearnac;
            $password = password_hash($password_sin_enc, PASSWORD_BCRYPT, ['cost' => 4]);
            $privilegio = 2;
            $estado = 1;
            $foto = "administrativo.jpg";
            
            // Registro de administrativo
            $administrativo = new Administrativo();
            $administrativo->setDocumento_identidad($documento_identidad);
            $administrativo->setTipo_documento($tipo_documento);
            $administrativo->setNombres($nombres);
            $administrativo->setApe_paterno($ape_paterno);
            $administrativo->setApe_materno($ape_materno);
            $administrativo->setCorreo($correo);
            $administrativo->setCelular($celular);
            $administrativo->setFecha_nac($fecha_nac);
            $administrativo->setUsuario($usuario_nick);
            $administrativo->setPassword($password);
            $administrativo->setPrivilegio($privilegio);
            $administrativo->setEstado($estado);
            $administrativo->setFoto($foto);            
            $registrarAdministrativo = $administrativo->registrarAdministrativo();
            
            if($registrarAdministrativo){
                
                $_SESSION['completed'] = "Registro completado correctamente";

            }
        }else{
            $_SESSION['failed'] = "Hubo un error al guardar los datos del administrativo";
        }
        
        header("Location:".base_url.'administrativo/registro');
    }
}