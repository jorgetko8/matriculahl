<?php
    session_start();
    require_once 'autoload.php';
    require_once 'config/db.php';
    require_once 'config/parameters.php';

    // ucfirst() : Combierte a mayuscula el primer caracter del string
function showError(){
    $error = new ErrorController();
    $error->index();
}    


//if(isset($_GET['controller']) && $_GET['controller']=='usuario'){
//    if(isset($_GET['action']) && $_GET['action']=='login'){
//        $nombre_controlador = $_GET['controller'].'Controller';
//        $action = $_GET['action'];
//
//        $controlador = new $nombre_controlador();
//        $controlador->$action();
//        exit();
//    }
//}
//

    
if(isset($_GET['controller'])){
    
    $nombre_controlador = $_GET['controller'].'Controller';
    
}elseif(!isset($_GET['controller']) || !isset($_GET['action'])){
    $nombre_controlador = controller_default;
    
}else{
    showError();
    exit();
}


if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        
        $action = $_GET['action'];

        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        showError();
    }
    
}else{
    showError();
}


