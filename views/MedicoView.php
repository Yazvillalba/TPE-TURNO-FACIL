<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class MedicoView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }


    function showFormAgregarMedico($secretarias = null, $error = null){
        $this->smarty->assign('error',$error);
        $this->smarty->assign('secretarias',$secretarias);
        $this->smarty->display('templates/medico/formAgregarMedico.tpl');
    }
    function showListaMedicos($medicos, $secretarias){
        $this->smarty->assign('listaMedicos', 'medicos');
        $this->smarty->assign('secretarias', $secretarias);
        $this->smarty->assign('medicos', $medicos);
        $this->smarty->display('../templates/medico/listaMedicos.tpl');

    }

    function showError($msgError = null)
    {
        $this->smarty->assign('error', $msgError);
        $this->smarty->display('../templates/error.tpl');
    }

}