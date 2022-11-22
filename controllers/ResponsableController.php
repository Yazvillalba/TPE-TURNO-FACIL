<?php

require_once 'views/AuthView.php';
<<<<<<< HEAD
require_once 'views/SecretariaView.php';
=======
require_once 'models/ResponsableModel.php';
require_once 'views/MedicoView.php';
require_once 'models/PacienteModel.php';
>>>>>>> 4ce39a8cc6201cd6fe7405348584e029a5c2601b

class ResponsableController{

    private $authView;
<<<<<<< HEAD
    private $secretariaView;

    public function __construct(){
        $this->authView = new AuthView();
        $this->secretariaView = new SecretariaView();
=======
    private $medicoView;
    private $responsableModel;
    private $pacienteModel;

    public function __construct(){
        $this->authView = new AuthView();
        $this->medicoView = new MedicoView();
        $this->responsableModel = new ResponsableModel();
        $this->pacienteModel = new PacienteModel();
>>>>>>> 4ce39a8cc6201cd6fe7405348584e029a5c2601b
    }

    public function showLoginResponsable(){
        $this-> authView->showFormLoginResponsable();  //LOGIN RESPONSABLE [1]
    }

<<<<<<< HEAD
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
=======
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

>>>>>>> 4ce39a8cc6201cd6fe7405348584e029a5c2601b
}