<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class AuthView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showFormLogin($error = null){
        $this->smarty->assign('error' , $error);
        $this->smarty->display('templates/formLogin.tpl');
    }
    function showFormLoginResponsable($error = null){  //login responsable muestra formulario para ingresar con usuario y contraseña
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/formLoginResponsable.tpl');
    }
    function showFormAdministacion($error = null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/sectionResponsable.tpl');
    }
}