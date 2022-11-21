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
    function getUserData($user){ //LOGIN RESPONSABLE
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$user]);
        $userData = $query->fetch(PDO::FETCH_OBJ);
        return  $userData;
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
        $query = $this->db->prepare('SELECT m.apellido, m.nombre, m.dia, m.desde, m.hasta, m.id
                                    FROM medico m
                                    WHERE m.id = ?');
        $query->execute([$id]);
        $diasMedico = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $diasMedico;
    }
    function getMedicoById($id){
        $query = $this->db->prepare('SELECT * FROM medico WHERE id = ?');
        $query->execute([$id]);
        $medico = $query->fetch(PDO::FETCH_OBJ); 
        return  $medico;
    }

    function getTurnosMedicoById($id){
        $query = $this->db->prepare('SELECT m.apellido, m.nombre, t.fecha, t.horario , t.dia, t.id, t.id_paciente
                                    FROM medico m JOIN turno t 
                                    ON m.id = t.id_medico
                                    WHERE m.id = ?');
        $query->execute([$id]);
        $turnosMedico = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $turnosMedico;
    }
    function getTurnoById($id){
        $query = $this->db->prepare('SELECT m.*, t.*
                                    FROM medico m JOIN turno t 
                                    ON m.id = t.id_medico
                                    WHERE t.id = ?');
        $query->execute([$id]);
        $turno = $query->fetch(PDO::FETCH_OBJ); 
        return  $turno;
    }
    function getPacienteById($id){
        $query = $this->db->prepare('SELECT *  FROM paciente 
                                        WHERE id =?');
        $query->execute([$id]);
        $paciente = $query->fetch(PDO::FETCH_OBJ);
        return  $paciente;
    }

    public function getPacienteObraSocial($id){
        $query = $this->db->prepare('SELECT nombre_os 
                                    FROM obra_social 
                                    WHERE  id= ?');
        $query->execute([$id]);
        $nombreObraSocial = $query->fetch(PDO::FETCH_OBJ);
        return  $nombreObraSocial;
    }
 
    function searchMedicos($textToSearch){
        $query = $this->db->prepare('SELECT * FROM MEDICO
                                    WHERE apellido  LIKE ? OR nombre LIKE ? ');
        $query->execute(array($textToSearch, $textToSearch));
        $medicoSearched = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicoSearched;
    }

    function getMedicosByObraSocial($obraSocial){
        $query = $this->db->prepare('SELECT DISTINCT m.apellido, m.nombre, os.nombre_os, m.matricula, m.importe_consulta, m.especialidad,m.id
                                    FROM obra_social os JOIN medico_os mo 
                                    ON os.id = mo.id_obra_social
                                    JOIN medico m 
                                    ON m.id = mo.id_medico
                                    WHERE os.id = ?
                                    ORDER BY m.apellido ASC');
        $query->execute([$obraSocial]);
        $medicosPorObraSocial = $query->fetchAll(PDO::FETCH_OBJ);
        return  $medicosPorObraSocial;
    }

    function getAllObraSocialXIdMedico($id_medico){
        $query = $this->db->prepare('SELECT m.id_obra_social FROM medico_os m WHERE id_medico = ?');
        $query->execute([$id_medico]);
        $listadoObraSociales = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $listadoObraSociales;
    }
    
    function takeTurn($id_paciente, $id_turno){
        $query = $this->db->prepare('UPDATE `turno` SET id_paciente = ? WHERE id = ?');
        $query->execute([$id_paciente, $id_turno]);
        
    }
}