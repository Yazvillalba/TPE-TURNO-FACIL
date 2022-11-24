<?php
require_once 'models/SecretariaModel.php';
require_once 'views/SecretariaView.php';
require_once 'views/PacienteView.php';
require_once 'models/MedicoModel.php';
class SecretariaController{

    private $pacienteView;
    private $secretariaView;
    private $secretariaModel;
    private $medicoModel;
    public function __construct(){
        $this->pacienteView = new PacienteView();
        $this->secretariaView = new SecretariaView();
        $this->secretariaModel = new secretariaModel();
        $this->medicoModel = new medicoModel();
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

    function deleteSecretaria($id){

        $secretaria = $this->secretariaModel->getSecretariaById($id);

        if ($secretaria) {

            $this->secretariaModel->deleteSecretaria($id);

            header("Location: " .ADMINISTRACION);
        } else {

            $this->pacienteView->showError("La categoría no existe");
        }
    }

    function renderModificarSecretaria($id){
        $secretarias = $this->secretariaModel->getAllSecretarias();
        $this->secretariaView->renderModifySecretaria($id, $secretarias);
    }

    function modificarSecretaria(){
        if (
            !empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) && !empty($_REQUEST['id']) &&
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) && isset($_REQUEST['id'])
        ){                  
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $id = $_REQUEST['id'];

            $modify = $this->secretariaModel->modifySecretaria($nombre, $apellido , $id);
            

            if ($modify) {
                header("Location: " . ADMINISTRACION);
            } else {
                $this->pacienteView->showError("No se pudo modificar");
            }
        } else {
            $this->pacienteView->showError("Ingresos inválidos");
        } 
    }

}