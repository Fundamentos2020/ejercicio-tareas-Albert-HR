<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

require_once("/opt/lampp/htdocs/Consultas/Models/DB.php");

class Categoria {
    private $db;
    private $servicio;

    public function __construct() {
        $dbs = new ServiceTr();
        $this->db = $dbs->getDB();
    }

    public function getCategorias() {


        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $categoria = array();
            
            $categoria[] = $row['id'];
            $categoria[] = $row['nombre'];

            $this->servicio[] = $categoria;
        }

        return $this->servicio;
        $this->db = null;
    }

    public function getCategoriasBy($val) {

        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = :com ');
        $query->bindParam(':com', $val, PDO::PARAM_INT);
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $categoria = array();
            
            $categoria[] = $row['nombre'];

            $this->servicio[] = $categoria;
        }

        return $this->servicio;
        $this->db = null;
    }
}

?>