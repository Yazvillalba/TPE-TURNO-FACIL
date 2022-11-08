<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/PacienteController.php';
require_once 'controllers/MedicoController.php';

// defino la base url para la construccion de links con urls semánticas

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'login';
}

$params = explode('/', $action);

$authController = new AuthController();
$pacienteController = new PacienteController();
$medicoController = new MedicoController();

switch ($params[0]) {
    case 'login':
        $authController->showLogin();  //viene por get
    break;
    case 'verify':
        $authController->login();  //viene por post
    break;
    case'logout':
        $authController->logout();
    break;
    case 'seleccionar':
        $pacienteController->indexTurno();
        break;
    case 'buscarRangoHorarioMedico';
        $pacienteController->indexDiasMedico();
        break;
    case 'buscarMedico':    
        $pacienteController->indexMedico($params[1]);
        break;    
    case 'medicoTrabajaObraSocial':
        $medicoController->trabajaConObraSocial(2,3);
        break;
    case 'tomarTurno':     
        $pacienteController->tomarTurnoDetalles($params[1]);
    break;  
    case 'encontrarMedico':
        $pacienteController->encontrarMedico();
    break;
}

