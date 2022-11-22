<?php
require_once './libs/smarty-master/libs/Smarty.class.php';

class SecretariaView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showFormAgregarSecretaria($error = null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('templates/secretaria/formAgregarSecretaria.tpl');
    }

    function showListaSecretarias($secretarias){
        $this->smarty->assign('listaSecretarias', 'secretarias');
        $this->smarty->assign('secretarias', $secretarias);
        $this->smarty->display('../templates/secretaria/listaSecretarias.tpl');

    }
}