<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

    class ServiceTr {
        private $db;

        public function __construct() {
            
            //Elementos de constructor
            $dsn = 'mysql:dbname=lista_tareas;host=localhost';
            $usuario = 'root';
            $contraseña = '';

            $this->db = new PDO($dsn, $usuario, $contraseña);

            //Atributos de error
            $attribute = PDO::ATTR_ERRMODE;
            $value = PDO::ERRMODE_EXCEPTION;
            $this->db->setAttribute($attribute,$value);

            //Atributos de verificacion de errores
            $attribute = PDO::ATTR_EMULATE_PREPARES;
            $value = PDO::ERRMODE_EXCEPTION;
            $this->db->setAttribute($attribute,$value);

        }


        public function getDB() {
            return $this->db;
        }
    }

    
?>