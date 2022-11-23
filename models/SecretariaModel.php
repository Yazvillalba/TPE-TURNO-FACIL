<?php

class SecretariaModel{
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