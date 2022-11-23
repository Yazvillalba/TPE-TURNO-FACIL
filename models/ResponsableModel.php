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

    function modifyMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta,$id){
        $query =  $this->db->prepare('UPDATE `medico` 
        SET `nombre` = ?, 
        `apellido` = ?,
        `matricula` = ?,
        `importe_consulta` = ?,
        `especialidad` = ?,
        `dia` = ?,
        `desde` = ?,
        `hasta` = ?
        WHERE `id` = ? '); 
        return $query->execute([$nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id]);
    }



}
