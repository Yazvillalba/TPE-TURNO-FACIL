<?php

require_once 'views/AuthView.php';

class ResponsableController{

    private $authView;

    public function __construct(){
        $this->authView = new AuthView();
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }
}