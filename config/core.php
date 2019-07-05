<?php
    namespace MVC\Config;

    use MVC\Config\DB as DB;

    class Core {
        // Preparation
        private $db;
        private $route;
        public function __construct() {
            $this->db = new DB();
            $this->route = new Route();
        }
    }

?>