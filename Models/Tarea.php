<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

require_once("/opt/lampp/htdocs/Consultas/Models/DB.php");

class Tarea {
    private $servicio;
    private $db;

    public function __construct() {
        $dbs = new ServiceTr();
        $this->db = $dbs->getDB();
    }

    public function getTareas() {


        $query = $this->db->prepare('SELECT * FROM tareas');
        $query->execute();

        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $tarea = array();
            
            $tarea[] = $row['id'];
            $tarea[] = $row['titulo'];
            $tarea[] = $row['descripcion'];
            $tarea[] = $row['fecha_limite'];
            $tarea[] = $row['completada'];
            $tarea[] = $row['categoria_id'];

            $this->servicio[] = $tarea;
        }

        return $this->servicio;
        $this->db = null;
    }

    public function getTareasBy($val) {

        $query = $this->db->prepare("SELECT * FROM tareas WHERE categoria_id = :com");
        $query->bindParam(':com', $val, PDO::PARAM_INT);
        $query->execute();
        
        while($row = $query->fetch(PDO::FETCH_ASSOC))
        {
            $tarea = array();
            
            $tarea[] = $row['id'];
            $tarea[] = $row['titulo'];
            $tarea[] = $row['descripcion'];
            $tarea[] = $row['fecha_limite'];
            $tarea[] = $row['completada'];
            $tarea[] = $row['categoria_id'];

            $this->servicio[] = $tarea;
        }

        return $this->servicio;
        $this->db = null;
    }
}


?>