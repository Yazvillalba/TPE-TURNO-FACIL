<?php

include_once('models/MedicoModel.php');
include_once('views/MedicoView.php');
include_once ('views/PacienteView.php');
include_once('models/PacienteModel.php');
include_once('models/ResponsableModel.php');

class MedicoController{

    private $medicoModel;
    private $medicoView;
    private $pacienteModel;
    private $pacienteView;
    private $responsableModel;

    public function __construct(){
        $this->medicoModel = new MedicoModel();
        $this->medicoView = new MedicoView();
        $this->pacienteModel = new PacienteModel();
        $this->pacienteView = new PacienteView();
        $this->responsableModel = new ResponsableModel();
    }

    public function trabajaConObraSocial($id_medico, $id_obraSocial){
        
                $os_medico = $this->medicoModel->getAllObraSocialXIdMedico($id_medico);
                // tengo todos los id_medicos asociados a id_obraSocial
                if (!empty($os_medico)){ 
                    for ($i=0; $i < count($os_medico); $i++) {

                        if (($id_medico == $os_medico[$i]->id_medico) AND
                            ($id_obraSocial == $os_medico[$i]->id_obraSocial))
                            function_alert("EL medico Trabaja con la Obra Social");
                            return true;
                    } 
                    function_alert("EL medico NO Trabaja con la Obra Social");
                    return false;
                }
    }
    //FUNCIONES USADAS EN EL LOGIN DE RESPONSABLE DE LA INSTITUCION 
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
            $this->medicoModel->insertMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id_secretaria);
            header("Location: " .ADMINISTRACION);
        } else {
            $this->medicoView->showError("Ingresos inválidos");
        }
    }
    function listarMedicos(){
        $medicos = $this->pacienteModel->getAllMedicos();
        $secretarias = $this->responsableModel->getAllSecretarias();
        $this->medicoView->showListaMedicos($medicos, $secretarias);
    }

    function deleteMedico($id){
        $medico = $this->pacienteModel->getMedicoById($id);
        if ($medico) {
            $this->medicoModel->deleteMedico($id);
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

            $modify = $this->medicoModel->modifyMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta,$id);
            

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

// mensaje de alert
function function_alert($message) {
    echo "<script>alert('$message');</script>";
}


