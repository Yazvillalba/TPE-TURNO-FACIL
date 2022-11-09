<?php

include_once('models/PacienteModel.php');
include_once('views/PacienteView.php');
include_once('helper/AuthHelper.php');

class PacienteController{

    private $pacienteModel;
    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->pacienteModel = new PacienteModel();
        $this->view = new PacienteView();
        $this->authHelper = new AuthHelper();
    }

    public function indexTurno()
    {
        $medicos = $this->pacienteModel->getAllMedicos();
        $obrasSociales = $this->pacienteModel->getAllObrasSociales();
        $this->view->showIndexTurno($medicos, $obrasSociales);
    }

    public function indexMedico($id)
    {
        
            $turnosMedico = $this->pacienteModel->getTurnosMedicoById($id);
            $medico = $this->pacienteModel->getMedicoById($id);
            $this->view->showIndexTurnosMedico($turnosMedico, $medico->apellido);     
    }

    public function indexDiasMedico()
    {
        if(!empty($_POST['medico']) ){
        $id = $_REQUEST['medico'];
        $diasMedico = $this->pacienteModel->getDiasMedicoById($id);
        $this->view->showIndexDiasMedico($diasMedico);
        }
    }
    public function tomarTurnoDetalles($id)
    {
        $isLoggedIn = $this->authHelper->getCurrentUserId();
        $turno = $this->pacienteModel->getTurnoById($id);
        $paciente = $this->pacienteModel->getPacienteById($isLoggedIn);
        $obraSocialId = $paciente->id_obra_social;
        $obraSocialPaciente = $this->pacienteModel->getPacienteObraSocial($obraSocialId);
        $this->view->showTurnoDetalles($turno, $paciente, $obraSocialPaciente);
    
    }
    function encontrarMedico(){
        if(!isset($_REQUEST['textToSearch']) || empty($_REQUEST['textToSearch'])){
            $this->view->showError("Nada para buscar");
            die();
        }
        $textToSearch = $_REQUEST['textToSearch'];
        $textToSearch = '%'.$textToSearch.'%';
        $searchMedico = $this->pacienteModel->searchMedicos($textToSearch);
        $this->view->showIndexDiasMedico($searchMedico);
    }

    public function indexObraSocial()
    {
        if(empty($_POST['obraSocialSelect'])) {
            $this->view->showError("Seleccionar Obra Social");
        }else {
            if(!empty($_POST['obraSocialSelect']) && ($_POST['obraSocialSelect']) != 'particular'){
                $obraSocial_id = $_REQUEST['obraSocialSelect'];
                $medicosPorObraSocial = $this->pacienteModel->getMedicosByObraSocial($obraSocial_id);
                }
        else {
                $medicosPorObraSocial = $this->pacienteModel->getAllMedicos(); 
            }
        $this->view->showIndexMedicosObraSocial($medicosPorObraSocial);
        }

    }
            
        }
        
    

