<?php
require_once 'models/SecretariaModel.php';
require_once 'views/SecretariaView.php';
require_once 'views/PacienteView.php';
class SecretariaController{

    private $secretariaView;
    private $secretariaModel;
    private $pacienteView;
    public function __construct(){
        $this->secretariaView = new SecretariaView();
        $this->secretariaModel = new SecretariaModel();
        $this->pacienteView = new PacienteView();
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
            $this->secretariaModel->insertSecretaria($nombre, $apellido);
            header("Location: " .ADMINISTRACION);

        }
        else {
            $this->pacienteView->showError("Ingresos inválidos");
        }
    }

    function listarSecretarias(){
        $secretarias = $this->secretariaModel->getAllSecretarias();
        $this->secretariaView->showListaSecretarias($secretarias);
    }
    function medicoAsociadoSecretaria($id_secretaria){
        
        $secretaria = $this->secretariaModel->getSecretarias($id_secretaria);
        $medicos = $this->medicoModel->getMedicoAsociado($id_secretaria);
        $medicosSelect = $this->medicoModel->listarMedicos();
        $this->secretariaView->showMedicosAsociados($secretaria, $medicos, $medicosSelect);
    }
    function confirmarAsignacionMedico(){
        if(isset($_POST['id_medico']) && isset($_POST['id_secretaria'])){
            $id_secretaria = $_POST['id_secretaria'];
            $id_medico = $_POST['id_medico'];
            $this->secretariaModel->asignSecretaria($id_secretaria,$id_medico);

        }
        header("Location: " .BASE_URL.'/listaSecretarias'); 
    }
}