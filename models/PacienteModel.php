<?php
class PacienteModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }

    function getPaciente($dni){
        $query = $this->db->prepare('SELECT * FROM paciente WHERE dni =?');
        $query->execute([$dni]);
        $paciente = $query->fetch(PDO::FETCH_OBJ);
        return  $paciente;
    }

}