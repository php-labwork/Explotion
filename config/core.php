<?php
    namespace MVC\Config;

    class Core {
        // Preparation
        private $route;
        public function __construct() {
            $this->route = new Route();
        }

        public function route() {
            return $this->route;
        }
    }

?>