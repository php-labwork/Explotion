<?php
    use MVC\Config\Model;

    class Tutorial_model extends Model{
        public function __construct() {
            // Empty Constructor
            parent::__construct();
        }

        // Menu List
        public function getMenu() {
            return array(
                (object) array(
                    "text" => "Introduction",
                    "link" => "/tutorial/introduction"
                ),
                (object) array(
                    "text" => "Routing System",
                    "link" => "/tutorial/routing"
                ),
                (object) array(
                    "text" => "Controllers",
                    "link" => "/tutorial/controllers"
                ),
                (object) array(
                    "text" => "Models",
                    "link" => "/tutorial/models"
                ),
                (object) array(
                    "text" => "Views",
                    "link" => "/tutorial/views"
                ),
                (object) array(
                    "text" => "Assets",
                    "link" => "/tutorial/assets"
                ),
                (object) array(
                    "text" => "Request",
                    "link" => "/tutorial/request"
                ),
                (object) array(
                    "text" => "Templates & Demo",
                    "link" => "/tutorial/template"
                ),
            );
        }
    }

?>