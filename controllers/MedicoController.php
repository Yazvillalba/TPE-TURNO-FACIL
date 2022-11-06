<?php
/* Informar si ese médico no trabaja con Obra Social Seleccionada */

include_once('models/MedicoModel.php');
//include_once('views/MedicoView.php');
include_once('helper/AuthHelper.php');

class MedicoController{

    private $medicoModel;
//    private $view;
    private $authHelper;

    public function __construct()
    {
        $this->medicoModel = new MedicoModel();
  //      $this->view = new MedicoView();
        $this->authHelper = new AuthHelper();
    }

    public function trabajaConObraSocial($id_medico, $id_obraSocial){
 //   public function trabajaConObraSocial(){

   //     if (!empty($_REQUEST['medico']) && isset($_REQUEST['medico']) AND
     //       (!empty($_REQUEST['obraSocial']) && isset($_REQUEST['obraSocial']))){
        
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
}

// mensaje de alert
function function_alert($message) {
    echo "<script>alert('$message');</script>";
}
   

