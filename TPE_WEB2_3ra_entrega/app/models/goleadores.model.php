<?php
require_once './database/model.php';
class goleadoresModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=goleadores;charset=utf8', 'root', '');
    }

    function getGoleadores($parametros)
    {
        $sql = 'SELECT * FROM goleadores';
        if (isset($parametros['sort'])) {
            $sql .= ' ORDER BY ' . $parametros['sort'];
            if (isset($parametros['order'])) {
                $sql .= ' ' . $parametros['order'];
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute();
        $goleadores = $query->fetchAll(PDO::FETCH_OBJ);

        return $goleadores;
    }

    function getGoleadorById($Jugador_ID)
    {
        $query = $this->db->prepare('SELECT * FROM goleadores where Jugador_ID = ?');
        $query->execute([$Jugador_ID]);
        $details = $query->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }

    function insertGoleador($nombre, $club, $goles, $pj)
    {

        $query = $this->db->prepare('INSERT INTO goleadores (nombre, club, goles, pj) VALUES (?, ?, ?, ?)');
        $query->execute([$nombre, $club, $goles, $pj]);

        return $this->db->lastInsertId();
    }

    

    function modifyGoleador($nombre, $club, $goles, $pj, $Jugador_ID)
    {

        $query = $this->db->prepare('UPDATE goleadores SET Nombre = ?, Club = ?, Goles = ?, PJ = ? WHERE Jugador_ID = ?');
        $query->execute([$nombre, $club, $goles, $pj, $Jugador_ID]);
        return $query;
    }
}
