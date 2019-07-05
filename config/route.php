<?php
    namespace MVC\Config;
    
    class Route {
        // Preparation
        private $routes;
        public function __construct() {
            $this->routes = array(
                "get" => array(),
                "post" => array(),
                "put" => array(),
                "delete" => array()
            );
        }

        public function get($uri, $route) {
            if (in_array(array($uri, $route), $this->routes["get"])) {
                echo "Already";
            }
            else {
                array_push($this->routes["get"], 
                    array(
                        "uri" => $uri, 
                        "route" =>$route,
                        "params" => ""
                    ));
                echo "Berhasil Menambah";
            }
        }

        public function call() {
            if (empty($this->getURL())) header("location:?p=/");
            else {
                if(isset($_POST['_method'])) {

                }else {
                    $uri = $_GET['p'];
                    foreach ($this->routes["get"] as $item) {
                        if($item["uri"] == $uri) {
                            $fileName = strtolower(explode("@", $item["route"])[0]);
                            $methodName = explode("@", $item["route"])[1];
                            include_once "apps/controllers/".$fileName.".php";
                            $ref = new \ReflectionClass(ucfirst($fileName));
                            $obj = $ref->newInstance();
                            $obj->$methodName();
                            break;
                        }
                    }
                }
            }
        }

        public function getURL() {
            return $_SERVER["QUERY_STRING"];
        }
    }

?>