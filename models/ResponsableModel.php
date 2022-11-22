<?php
class ResponsableModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }

<<<<<<< HEAD
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
=======
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



}
>>>>>>> 4ce39a8cc6201cd6fe7405348584e029a5c2601b
