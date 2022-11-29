<?php

require_once 'views/AuthView.php';
require_once 'views/SecretariaView.php';
require_once 'models/SecretariaModel.php';
require_once 'views/PacienteView.php';
require_once 'models/ResponsableModel.php';
class ResponsableController{

    private $authView;
    private $secretariaView;
    private $secretariaModel;   
    private $pacienteView;
    private $responsableModel;
    public function __construct(){
        $this->authView = new AuthView();
        $this->secretariaView = new SecretariaView();
        $this->secretariaModel = new SecretariaModel();
        $this->pacienteView = new PacienteView();
        $this->responsableModel = new ResponsableModel();
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }
    public function formAgregarSecretaria(){
        $this->secretariaView->showFormAgregarSecretaria();
    }
    function asignarSecretarias(){
        $secretarias = $this->secretariaModel->getAllSecretarias();
        $this->secretariaView->asignarSecretarias($secretarias);
    } 
    function confirmarAsignacionSecretaria(){
        if(isset($_POST['id_secretaria']) && isset($_POST['id_medico'])){
            $id_secretaria = $_POST['id_secretaria'];
            $id_medico = $_POST['id_medico'];
            $this->secretariaModel->asignSecretaria($id_secretaria,$id_medico);

        }
        header("Location: " .BASE_URL.'listarMedicos'); 
    }
    function createUser(){
        if(!empty($_REQUEST['password-1']) && !empty($_REQUEST['password-2'])
         && !empty($_REQUEST['usuario']) && !empty($_REQUEST['nombre'])
         && isset($_REQUEST['password-1']) && isset($_REQUEST['password-2'])
         && isset($_REQUEST['usuario']) && isset($_REQUEST['nombre']) ){

            if ($_REQUEST['password-1'] != $_REQUEST['password-2']) { //Check que las contraseñas sean iguales
                $this->pacienteView->showError("Las contraseñas no coinciden");
                die;
            }
            $password = password_hash($_REQUEST['password-1'], PASSWORD_DEFAULT);
            $user = $_REQUEST['usuario'];
            $nombre = $_REQUEST['nombre'];
            $rol = $_REQUEST['rol'];
            $id = $this->responsableModel->insert($password, $user, $nombre, $rol); //Registro en la DB

          /*  if ($id) { //Si se devuelve un id, el usuario se registró y es logueado
                $userData = $this->responsableModel->getUserData($user);
                $this->authHelper->login($userData);
            } else {
                $this->pacienteView->showError("No pudo realizarse el registro");
            }*/
            header("Location: " . ADMINISTRACION);
        }else{
            $this->pacienteView->showError("Ingresos inválidos");
        }
    }
}