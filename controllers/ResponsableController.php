<?php

require_once 'views/AuthView.php';
require_once 'models/ResponsableModel.php';
require_once 'views/MedicoView.php';
require_once 'models/PacienteModel.php';

class ResponsableController{

    private $authView;
    private $medicoView;
    private $responsableModel;
    private $pacienteModel;

    public function __construct(){
        $this->authView = new AuthView();
        $this->medicoView = new MedicoView();
        $this->responsableModel = new ResponsableModel();
        $this->pacienteModel = new PacienteModel();
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }

    public function agregarMedico(){  
        //$secretarias = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showFormAgregarMedico($secretarias=null);
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
            $this->medicoView->showError("Ingresos inválidos");
        }
    }

    function listarMedicos(){
        $medicos = $this->pacienteModel->getAllMedicos();
        //$secretaria = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showListaMedicos($medicos, $secretaria = null);
    }

}