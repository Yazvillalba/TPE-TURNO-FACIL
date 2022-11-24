<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/PacienteController.php';
require_once 'controllers/MedicoController.php';
require_once 'controllers/ResponsableController.php';
require_once 'controllers/SecretariaController.php';
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
$responsable = new ResponsableController();
$secretariaController = new SecretariaController();
switch ($params[0]) {
    case 'login':
        $authController->showLogin();  
    break;
    case 'verify':
        $authController->login();  
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
    case 'agregarMedico': // muestra el formulario de alta de médico al APRETAR BOTÓn agregar médico;
        $medicoController->agregarMedico();
    break;
    case 'ingresarMedico': //al apretar botón INGRESAR del template de alta de médico, agrega los datos de un médico en la tabla medico de la BBDD
        $medicoController->insertMedico();
    break;
    case 'listarMedicos':  // al apretar BOTÓN LISTA MEDICOS muestra la tabla con los botones eliminar y modificar. FALTA ASOCIAR SECRETARIA
        $medicoController->listarMedicos();
    break;
    case 'borrarMedico': //cuando se apreta el boton eliminar se lo elimina de la BBDD
        $medicoController->deleteMedico($params[1]);
    break;
    case 'renderModificarMedico': //cuando apreta el boton modificar se abre el formulario para modificar los datos del medico
        $medicoController->renderModificarMedico($params[1]);
    break;
    case 'modificarMedico': //cuando se confirman los datos del formulario se hace el update en la BBDD
        $medicoController->modificarMedico();
    break;
    case 'confirmarMedico': //cuando se confirman los datos del formulario se hace el update en la BBDD
        $medicoController->modificarMedico();
    break;
    // lo que sigue a continuación agregado por Claudio para Secretaria:
    case 'formAgregarSecretaria':     //cuando apreta boton agregar secretaria muestra el formulario para agregarla
        $responsable->formAgregarSecretaria();
    break;
    case 'ingresarSecretaria': //se verifican los datos ingresador en el formulario y agrega la secretaria a la BBDD
        $secretariaController->insertSecretaria();
    break;
    case 'listaSecretarias': //se muestra la lista de secretarias con boton eliminar y modificar
        $secretariaController->listarSecretarias();
    break;
    case 'medicoAsociadoSecretaria': //permite asignar un medico a las secretarias
        $secretariaController->medicoAsociadoSecretaria($params[1]);
    break;
    case 'confirmarMedicoAsociado': //se confirma el medico que se eligio en el select y a ese medico se le asigna la secretaria
        $secretariaController->confirmarAsignacionMedico();
    break;
    case 'borrarSecretaria': //cuando se apreta borrar se borra esa secretaria de la BBDD
        $secretariaController->deleteSecretaria($params[1]);
    break;
    case 'renderModificarSecretaria': //cuando se apreta modificar se abre el formulario para modificar los datos de la secretaria
        $secretariaController->renderModificarSecretaria($params[1]);
    break;
    case 'confirmarSecretaria': //se apreta el boton confirmar datos y se hace el update en la table de BBDD
        $secretariaController->modificarSecretaria();
    break;
}


