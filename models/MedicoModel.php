<?php
class medicoModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_turnos_facil;charset=utf8', 'root', '');
    }
 
    function getAllObraSocialXIdMedico($id_medico){
        $query = $this->db->prepare('SELECT * FROM medico_os WHERE id_medico = ?');
        $query->execute($id_medico);
        $listadoObraSociales = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $listadoObraSociales ;
    }

    function getObraSocialXId($id){
        $query = $this->db->prepare('SELECT * FROM obra_social WHERE id = ');
        $query->execute([$id]);
        $obraSocial = $query->fetch(PDO::FETCH_OBJ); 
        return  $obraSocial;
    }

    function getMedicoXId($id){
        $query = $this->db->prepare('SELECT * FROM medico WHERE id = ');
        $query->execute([$id]);
        $medico = $query->fetch(PDO::FETCH_OBJ); 
        return  $medico;
    }
    function getMedicoAsociado($id_secretaria = null){
        if (isset($id_secretaria)) {
            $query = $this->db->prepare('SELECT * FROM medico WHERE id_secretaria = ?');
            $query->execute([$id_secretaria]);

            $medicos = $query->fetchAll(PDO::FETCH_OBJ);
            return $medicos;
        } else {
            $query = $this->db->prepare('SELECT * FROM medico');
            $query->execute();
            $medicos = $query->fetchAll(PDO::FETCH_OBJ);
            return $medicos;
        }
    }

}