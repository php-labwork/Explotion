<?php
    use MVC\Config\Controller;

    class Error extends Controller{
        public function __construct() {
            parent::__construct();
        }

        // Not Found
        public function _not_found() {
            echo "404 Not Found";
        }
    }
?>