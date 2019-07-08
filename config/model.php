<?php
    namespace MVC\Config;

    class Model{
        private $db;
        public function __construct() {
            $this->db = new DB();
        }

        public function db() {
            $db = $this->db;
            include_once "apps/connection.php";
            return $this->db;
        }
    }
?>