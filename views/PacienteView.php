<?php

require_once './libs/smarty-master/libs/Smarty.class.php';

class PacienteView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showIndexTurno($medicos, $obrasSociales)
    {
        $this->smarty->assign('tituloIndex', 'Sacar turno');
        $this->smarty->assign('medicos', $medicos);
        $this->smarty->assign('obrasSociales', $obrasSociales);
        $this->smarty->display('../templates/paciente/seleccionar.tpl');
    }
    
    function showIndexDiasMedico($medicos){
        $this->smarty->assign('tituloIndexDias', 'Horarios de Atención');
        $this->smarty->assign('tituloMedico', $medicos);
        $this->smarty->assign('medicos', $medicos);
        $this->smarty->display('../templates/paciente/mostrarHorariosAtencionPorMedico.tpl');
    }

    function showError($msgError = null)
    {
        $this->smarty->assign('error', $msgError);
        $this->smarty->display('../templates/error.tpl');
    }
}
