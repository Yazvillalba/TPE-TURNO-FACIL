<?php

class AuthHelper{

    function __construct(){

        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public function login($paciente){
        $_SESSION['USER_ID'] = $paciente->id;
        $_SESSION['USER_NAME'] = $paciente->nombre;
    }
    
    public function checkLoggedIn(){
        if(empty($_SESSION['USER_ID'])){
            header("Location: " .LOGIN );
            die();
        }
    }

    function logout(){
        session_destroy();
        header('Location: '. LOGIN);
    }
}