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
        $query = $this->db->prepare('SELECT * FROM obra_social WHERE id = ?');
        $query->execute([$id]);
        $obraSocial = $query->fetch(PDO::FETCH_OBJ); 
        return  $obraSocial;
    }

    function getMedicoXId($id){
        $query = $this->db->prepare('SELECT * FROM medico WHERE id = ?');
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

    //función para listar los médicos de la tabla MEDICO de la BBDD ordenados alfeticamente por apellido ASCendente.
    function listarMedicos(){
        $query = $this->db->prepare('SELECT * from medico'); 
        $query->execute();
        $medicos = $query->fetchAll(PDO::FETCH_OBJ); 
        return  $medicos;
    }

        //la función da de ALTA un nuevo Médico en la tabla MEDICO de la BBDD con todos sus datos, secretaria puede ser null
    function insertMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id_secretaria=null){
        $query = $this->db->prepare('INSERT INTO medico(nombre,apellido, matricula, importe_consulta,especialidad,dia, desde,hasta,id_secretaria) 
        VALUES (?,?,?,?,?,?,?,?,?)');
        $query->execute([$nombre, $apellido, $matricula, $importe_consulta,$especialidad, $dia, $desde, $hasta, $id_secretaria]);
    } 

    //la funcion elimina un medico seleccionado de la tabla medico de la base de datos  
    function deleteMedico($id){
        $query =  $this->db->prepare('DELETE FROM `medico` WHERE `medico`.`id` = ?');
        $query->execute([$id]);
    }

    //la funcion modifica el medico de la tabla medico de la base de datos por el id
    function modifyMedico($nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id){
        $query =  $this->db->prepare('UPDATE `medico` 
        SET `nombre` = ?, 
        `apellido` = ?,
        `matricula` = ?,
        `importe_consulta` = ?,
        `especialidad` = ?,
        `dia` = ?,
        `desde` = ?,
        `hasta` = ?
        WHERE `medico`.`id` = ?');
        return $query->execute([$nombre, $apellido, $matricula, $importe_consulta, $especialidad, $dia, $desde, $hasta, $id]);
    }


}