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

    // agregado por Claudio para Secretaria
    public function formAgregarSecretaria(){
        $this->secretariaView->showFormAgregarSecretaria();
    }

    function insertSecretaria(){
        if (
            !empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) &&
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido'])
            ){
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $this->responsableModel->insertSecretaria($nombre, $apellido);
            header("Location: " .ADMINISTRACION);

        }
        else {
            $this->pacienteView->showError("Ingresos inválidos");
        }
    }

    function listarSecretarias(){
        $secretarias = $this->responsableModel->getAllSecretarias();
        $this->secretariaView->showListaSecretarias($secretarias);
    }
}