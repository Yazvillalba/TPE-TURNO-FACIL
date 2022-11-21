<?php
class ResponsableModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
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



}