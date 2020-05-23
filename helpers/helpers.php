<?php

class Helpers {

    public static function borrarErrores() {
        if(isset($_SESSION['error'])) {
           unset($_SESSION['error']);
        }
    }
    
    public static function borrarCompletado() {
        if(isset($_SESSION['completed'])) {
           unset($_SESSION['completed']);
        }
    }
    
    public static function borrarFallido() {
        if(isset($_SESSION['failed'])) {
           unset($_SESSION['failed']);
        }
    }

    public static function noSession(){
        if(!isset($_SESSION['identity'])){
            header("Location:".base_url);
        }
    }

    public static function noAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }
    }

}
