<?php

require_once 'helper/AuthHelper.php';
require_once 'views/AuthView.php';
require_once 'models/PacienteModel.php';

class AuthController{

    private $authHelper;
    private $authView;
    private $pacienteModel;


    public function __construct(){
        $this-> authHelper = new AuthHelper();
        $this->authView = new AuthView();
        $this->pacienteModel = new PacienteModel();

    }

    public function showLogin(){
        $this-> authView->showFormLogin();
    }
    
    public function showLoginResponsable(){//login responsable muestra formulario para ingresar con usuario y contraseña
        $this-> authView->showFormLoginResponsable();  
    }
    public function administracion(){
        $this->authView->showFormAdministacion();
    }
    
    //verifico  si los datos del  paciente  son correctos -> si el dni es igual al valor de la BD -> exito

    public function login(){
        if(!empty($_POST['dni']) && isset($_POST['dni']) ){
            $dni = $_POST['dni'];
            //obtengo el usuario de la DB
            $paciente = $this->pacienteModel->getPaciente($dni);
            if(!empty($paciente)){
                $this->authHelper->login($paciente);
                header("Location: " . BASE_URL. 'seleccionar');
            }else{
                $this->authView->showFormLogin('DNI incorecto.Intente nuevamente.'); 
            }

        }
        else
        {
            $this->authView->showFormLogin('DNI incorecto.Intente nuevamente.'); //Chequear que sale mas el cartel de error
        }  

    }

    public function loginResponsable(){ //LOGIN RESPONSABLE
        if (!empty($_POST['usuario']) && !empty($_POST['password']) 
        && isset($_POST['usuario']) && isset($_POST['password'])) {
            $user = $_POST['usuario'];
            $password = $_POST['password'];
            $userData = $this->pacienteModel->getUserData($user);
            if (!empty($userData) && password_verify($password, $userData->password)){

                $this->authHelper->loginResponsable($userData);
                header("Location: " . BASE_URL. 'administracion');
            } else {
                $this->authView->showFormLoginResponsable("Usuario y/o contraseña inválidos");
            }
        }else{
            $this->authView->showFormLoginResponsable("Ingrese usuario y contraseña");
        }
    }
    public function logout(){
        $this->authHelper->logout();
    }


}