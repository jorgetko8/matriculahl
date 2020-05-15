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

}
