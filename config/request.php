<?php
    namespace MVC\Config;

    class Request {
        public function __construct() {
            // Empty Constructor
        }

        // Method Get
        public function get($name) {
            return $_GET[$name];
        }

        // Method Post
        public function post($name) {
            if (isset($_POST["_csrf"]))
                return $_POST[$name];
            return null;
        }

        // Method Put
        public function put($name) {
            if (isset($_POST["_csrf"]))
                if (strtolower(isset($_POST["_method"])) == "put")
                    return $_POST[$name];
            return null;
        }

        // Method Delete
        public function delete($name) {
            if (isset($_POST["_csrf"]))
                if (strtolower(isset($_POST["_method"])) == "delete")
                    return $_POST[$name];
            return null;
        }

    }
?>