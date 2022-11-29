<?php

class ResponsableModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }
    function insert($password,$user,$name, $id_rol){
        $query = $this->db->prepare('INSERT INTO `usuarios` 
        (`id`, `nombre`, `email`, `password`,`id_rol`)
         VALUES (NULL, ?, ?, ?, ?);');
        $query->execute([$name,$user,$password,$id_rol]);
        return $this->db->lastInsertId();
   }
}