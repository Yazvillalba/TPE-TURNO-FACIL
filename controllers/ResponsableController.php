<?php

require_once 'views/AuthView.php';
require_once 'models/ResponsableModel.php';
require_once 'views/PacienteView.php';
require_once 'models/PacienteModel.php';
require_once 'views/MedicoView.php';
require_once 'views/SecretariaView.php';
require_once 'models/MedicoModel.php';
class ResponsableController{

    private $authView;
    private $pacienteModel;
    private $responsableModel;
    private $pacienteView;
    private $medicoView;
    private $secretariaView;
    private $medicoModel;
    public function __construct(){
        $this-> authHelper = new AuthHelper();
        $this->authView = new AuthView();
        $this->responsableModel = new ResponsableModel();
        $this->pacienteView = new PacienteView();
        $this->pacienteModel = new PacienteModel();
        $this->medicoView = new MedicoView();
        $this->secretariaView = new SecretariaView();
        $this->medicoModel = new medicoModel();
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }
    public function formAgregarMedico(){  
        $secretarias = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showFormAgregarMedico($secretarias);
    }

    public function formAgregarSecretaria(){
        $this->secretariaView->showFormAgregarSecretaria();
    }
    function insertMedico(){
        if (!empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) &&
            !empty($_REQUEST['matricula']) && !empty($_REQUEST['importe_consulta']) &&
            !empty($_REQUEST['especialidad']) && !empty($_REQUEST['dia']) &&
            !empty($_REQUEST['desde']) && !empty($_REQUEST['hasta']) &&
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) &&
            isset($_REQUEST['matricula']) && isset($_REQUEST['importe_consulta'])&&
            isset($_REQUEST['especialidad']) && isset($_REQUEST['dia']) &&
            isset($_REQUEST['desde']) && isset($_REQUEST['hasta'])){
              
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $matricula = $_REQUEST['matricula'];
            $importe_consulta = $_REQUEST['importe_consulta'];
            $especialidad = $_REQUEST['especialidad'];
            $dia = $_REQUEST['dia'];
            $desde = $_REQUEST['desde'];
            $hasta = $_REQUEST['hasta'];
            $id_secretaria = $_REQUEST['id_secretaria'];

            if($id_secretaria == 0){
                $id_secretaria = null;
            }
            $this->responsableModel->insertMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id_secretaria);
            header("Location: " .ADMINISTRACION);
        } else {
            $this->pacienteView->showError("Ingresos inválidos");
        }
    }
    function asignarSecretarias(){
        $secretarias = $this->responsableModel->getAllSecretarias();
        $this->secretariaView->asignarSecretarias($secretarias);
    }   
   function confirmarAsignacionSecretaria(){
        if(isset($_POST['id_secretaria']) && isset($_POST['id_medico'])){
            $id_secretaria = $_POST['id_secretaria'];
            $id_medico = $_POST['id_medico'];
            $this->responsableModel->asignSecretaria($id_secretaria,$id_medico);

        }
        header("Location: " .BASE_URL.'/listaMedicos'); 
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
    function listarMedicos(){
        $medicos = $this->pacienteModel->getAllMedicos();
        $secretaria = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showListaMedicos($medicos, $secretaria);
    }

    function deleteMedico($id){

        $medico = $this->pacienteModel->getMedicoById($id);

        if ($medico) {

            $this->responsableModel->deleteMedico($id);

            header("Location: " .ADMINISTRACION);
        } else {

            $this->pacienteView->showError("La categoría no existe");
        }
    }
    function renderModificarMedico($id){
        $medicos = $this->pacienteModel->getAllMedicos();
        $this->medicoView->renderModifyMedico($id, $medicos);
    }
    function modificarMedico(){
        if (
            !empty($_REQUEST['nombre']) && !empty($_REQUEST['apellido']) &&
            !empty($_REQUEST['matricula']) && !empty($_REQUEST['importe_consulta']) &&
            !empty($_REQUEST['especialidad']) && !empty($_REQUEST['dia']) &&
            !empty($_REQUEST['desde']) && !empty($_REQUEST['hasta']) && !empty($_REQUEST['id']) &&
            isset($_REQUEST['nombre']) && isset($_REQUEST['apellido']) &&
            isset($_REQUEST['matricula']) && isset($_REQUEST['importe_consulta'])&&
            isset($_REQUEST['especialidad']) && isset($_REQUEST['dia']) &&
            isset($_REQUEST['desde']) && isset($_REQUEST['hasta']) && isset($_REQUEST['id'])
        ){                  
            $nombre = $_REQUEST['nombre'];
            $apellido = $_REQUEST['apellido'];
            $matricula = $_REQUEST['matricula'];
            $importe_consulta = $_REQUEST['importe_consulta'];
            $especialidad = $_REQUEST['especialidad'];
            $dia = $_REQUEST['dia'];
            $desde = $_REQUEST['desde'];
            $hasta = $_REQUEST['hasta'];
            $id = $_REQUEST['id'];
     
            $modify = $this->responsableModel->modifyMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta,$id);
            

            if ($modify) {
                header("Location: " . ADMINISTRACION);
            } else {
                $this->pacienteView->showError("No se pudo modificar");
            }
        } else {
            $this->pacienteView->showError("Ingresos inválidos");
        } 
    } 
    function listarSecretarias(){
        $secretarias = $this->responsableModel->getAllSecretarias();
        $this->secretariaView->showListaSecretarias($secretarias);
    }
    function medicoAsociadoSecretaria($id_secretaria){
        
       $secretaria = $this->responsableModel->getSecretarias($id_secretaria);
       $medicos = $this->medicoModel->getMedicoAsociado($id_secretaria);
       $this->secretariaView->showMedicosAsociados($secretaria, $medicos);
    }
    function deleteSecretaria($id){

        $secretaria = $this->responsableModel->getSecretariaById($id);

        if ($secretaria) {

            $this->responsableModel->deleteSecretaria($id);

            header("Location: " .ADMINISTRACION);
        } else {

            $this->pacienteView->showError("La categoría no existe");
        }
    }
    function renderModificarSecretaria($id){
        $secretarias = $this->responsableModel->getAllSecretarias();
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
     
            $modify = $this->responsableModel->modifySecretaria($nombre, $apellido , $id);
            

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
