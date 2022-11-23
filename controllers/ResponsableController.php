<?php

require_once 'views/AuthView.php';
require_once 'views/SecretariaView.php';
require_once 'views/MedicoView.php';
require_once 'views/PacienteView.php';
require_once 'models/ResponsableModel.php';
require_once 'models/PacienteModel.php';

class ResponsableController{

    private $authView;
    private $secretariaView;   
    private $medicoView;
    private $pacienteView;
    private $responsableModel;
    private $pacienteModel;

    public function __construct(){
        $this->authView = new AuthView();
        $this->medicoView = new MedicoView();
        $this->secretariaView = new SecretariaView();
        $this->pacienteView = new PacienteView();
        $this->responsableModel = new ResponsableModel();
        $this->pacienteModel = new PacienteModel();
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
    public function agregarMedico(){  
        //$secretarias = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showFormAgregarMedico($secretarias=null);
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
        $medico = $this->pacienteModel->getMedicoById($id);
        var_dump($medico);
        $this->medicoView->renderModifyMedico($id, $medico);
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
                header("Location: " . BASE_URL.'listarMedicos');
            } else {
                $this->medicoView->showError("No se pudo modificar");
            }
        } else {
            $this->pacienteView->showError("Ingresos inválidos");
        } 
    } 
}