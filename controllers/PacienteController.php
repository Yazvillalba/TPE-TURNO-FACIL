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
}