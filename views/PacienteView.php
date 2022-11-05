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
    
    function showIndexTurnosMedico($turnosMedico){
        $this->smarty->assign('tituloIndexTurnos', 'Turnos disponibles');
        $this->smarty->assign('tituloMedico', 'MEJORAR ');
        $this->smarty->assign('turnos', $turnosMedico);
        $this->smarty->display('../templates/paciente/seleccionarTurnos.tpl');
    }

    function showError($msgError = null)
    {
        $this->smarty->assign('error', $msgError);
        $this->smarty->display('../templates/error.tpl');
    }
}
