<?php

require_once 'views/AuthView.php';
require_once 'views/SecretariaView.php';
require_once 'models/SecretariaModel.php';

class ResponsableController{

    private $authView;
    private $secretariaView;
    private $secretariaModel;   

    public function __construct(){
        $this->authView = new AuthView();
        $this->secretariaView = new SecretariaView();
        $this->secretariaModel = new SecretariaModel();
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
}