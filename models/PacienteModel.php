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

    function getAllMedicos(){
        $query = $this->db->prepare('SELECT * FROM medico ORDER BY apellido ASC');
        $query->execute();
        $medicos = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicos;
    }
    
    function getAllObrasSociales(){
        $query = $this->db->prepare('SELECT * FROM obra_social ORDER BY nombre_os ASC');
        $query->execute();
        $obrasSociales = $query->fetchAll(PDO::FETCH_OBJ);
        return  $obrasSociales;
    }

    function getDiasMedicoById($id){
        $query = $this->db->prepare('SELECT m.apellido, m.nombre, m.dias, m.desde, m.hasta
                                    FROM medico m
                                    WHERE m.id = ?');
        $query->execute([$id]);
        $diasMedico = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $diasMedico;
    }

    function searchMedicos($textToSearch){
        $query = $this->db->prepare('SELECT * FROM MEDICO
                                    WHERE apellido LIKE ? ');
        $query->execute(array($textToSearch));
        $medicoSearched = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicoSearched;
    }
}