<?php

require_once 'views/AuthView.php';
require_once 'views/SecretariaView.php';

class ResponsableController{

    private $authView;
    private $secretariaView;   

    public function __construct(){
        $this->authView = new AuthView();
        $this->secretariaView = new SecretariaView();
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }
    public function formAgregarSecretaria(){
        $this->secretariaView->showFormAgregarSecretaria();
    }
}