<?php
class ResponsableModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }

    function insertSecretaria($nombre, $apellido){
        $query = $this->db->prepare('INSERT INTO secretaria(nombre,apellido) 
        VALUES (?,?)');
        $query->execute([$nombre, $apellido]);
    }

    function getAllSecretarias(){
        $query = $this->db->prepare('SELECT * from secretaria'); 
        $query->execute();
        $secretarias = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $secretarias;
    }
    function listarMedicos(){
        $query = $this->db->prepare('SELECT * from medico'); 
        $query->execute();
        $medicos = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicos;
    }

    function insertMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id_secretaria=null){
        $query = $this->db->prepare('INSERT INTO medico(nombre,apellido, matricula, importe_consulta,especialidad,dia, desde,hasta,id_secretaria) 
        VALUES (?,?,?,?,?,?,?,?,?)');
        $query->execute([$nombre, $apellido, $matricula, $importe_consulta,$especialidad, $dia, $desde, $hasta, $id_secretaria]);
    }

    function deleteMedico($id){
        $query =  $this->db->prepare('DELETE FROM `medico` WHERE `medico`.`id` = ?');
        $query->execute([$id]);
    }

    function modifyMedico($id, $nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta){
        $query =  $this->db->prepare('UPDATE `medico` 
        SET `nombre` = ?, 
        `apellido` = ?,
        `matricula` = ?
        `importe_consulta` = ?,
        `especialidad` = ?,
        `dia` = ?,
        `desde` = ?,
        `hasta` = ?
        WHERE `medico`.`id` = ?'); 
        return $query->execute([$id,$nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta]);
    }
    function getSecretarias($id_secretaria = null){
        if (isset($id_secretaria)) {
            $query = $this->db->prepare('SELECT * FROM secretaria WHERE id_secretaria = ?');
            $query->execute([$id_secretaria]);
            $secretarias = $query->fetchAll(PDO::FETCH_OBJ);
        }
        else{
            $query = $this->db->prepare('SELECT * FROM secretaria');
            $query->execute();
            $secretarias = $query->fetchAll(PDO::FETCH_OBJ);
        }
        
        return $secretarias;
    }
    function asignSecretaria($id_secretaria,$id_medico){
        $query = $this->db->prepare('UPDATE medico SET id_secretaria= ? WHERE id = ?');

        $query->execute([$id_secretaria,$id_medico]);
    }

}
