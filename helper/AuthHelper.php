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
    function loginResponsable($user){
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['USER_ROL'] = $user->id_rol;
        $_SESSION['LAST_ACTIVITY'] = time();
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
    
    function getCurrentUserId()
    {  
        return $_SESSION['USER_ID']; 
    }
}