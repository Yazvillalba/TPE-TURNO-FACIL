<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/PacienteController.php';
require_once 'controllers/MedicoController.php';

// defino la base url para la construccion de links con urls semánticas

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');
define('SELECCIONAR', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) .'/seleccionar');
define('ADMINISTRACION', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) .'/administracion');


if (!empty($_GET['action'])){
    $action = $_GET['action'];
}
else {
    $action = 'seleccionar';
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
        $medicoController->trabajaConObraSocial($params[1],$params[2]);
        break;
    case 'tomarTurno':     
        $pacienteController->tomarTurnoDetalles($params[1]);
    break;  
    case 'encontrarMedico':
        $pacienteController->encontrarMedico();
    break;
    case 'buscarMedicosPorObraSocial':     
        $pacienteController->indexObraSocial();
        break; 
    case 'confirmarTurno':     
        $pacienteController->confirmarTurno($params[1]);
    break;
    case 'loginResponsable'://login responsable muestra formulario para ingresar con usuario y contraseña
        $authController-> showLoginResponsable(); 
    break;
    case 'verifyResponsable'://verifica los datos del formulario, si esta bien el usuario y contraseña ingresa sino pone incorrecto
        $authController->loginResponsable();
    break;                                              
    case 'administracion': //te dirige una vez loggeado el responsable a una "seccion" donde aparecen botones para elegir que hacer
        $authController->administracion();
    break;
}

