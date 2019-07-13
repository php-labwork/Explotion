<?php
    namespace MVC\Config;
    
    class Route {
        // Preparation
        private $routes;
        public function __construct() {
            $this->routes = array(
                "get" => array(),
                "post" => array(),
                "put" => array()
            );
        }

        /**
         * Route With Get Method
         * Default With 2 Params : @uri and @route
         * If You Need Route With Data Params: @uri, @route, @data
         */
        public function get($uri, $route, $data=array()) {
            $this->addRoute("get", $uri, $route, $data);
        }

        /**
         * Route With Post Method
         * Default With 2 Params : @uri and @route
         * If You Need Route With Data Params: @uri, @route, @data
         */
        public function post($uri, $route, $data=array()) {
            $this->addRoute("post", $uri, $route, $data);
        }

        /**
         * Route With Put Method
         * Default With 2 Params : @uri and @route
         * If You Need Route With Data Params: @uri, @route, @data
         */
        public function put($uri, $route, $data=array()) {
            $this->addRoute("put", $uri, $route, $data);
        }

        /**
         * Route With Delete Method
         * Default With 2 Params : @uri and @route
         * If You Need Route With Data Params: @uri, @route, @data
         */
        public function delete($uri, $route, $data=array()) {
            $this->addRoute("delete", $uri, $route, $data);
        }

        private function addRoute($method, $uri, $route, $data=array()) {
            if (in_array(array($uri, $route), $this->routes[$method])) {
                echo "Route is already to initialized";
            }
            else if (in_array(array($uri, $route, $data), $this->routes[$method])) {
                echo "Route is already to initialized";
            }
            else {
                if (count($data) == 0) {
                    // Route Without Data
                    array_push($this->routes[$method], 
                        array(
                            "uri" => $uri, 
                            "route" =>$route,
                            "params" => array()
                        ));
                }
                else {
                    // Route With Data
                    array_push($this->routes[$method], 
                        array(
                            "uri" => $uri, 
                            "route" =>$route,
                            "params" => $data
                        ));
                }
            }
        }

        /**
         * Execute Routing System
         */
        public function call() {
            if (empty($this->getURL())) header("location:?p=/");
            else {
                $uri = $_GET['p'];
                if($this->checkMethod() != null) {
                    // Action With Method Get
                    $uriSegment = explode("/", $uri);
                    if (count($uriSegment) == 2) {
                        foreach ($this->routes[$this->checkMethod()] as $item) {
                            if($item["uri"] == $uri) {
                                $fileName = strtolower(explode("@", $item["route"])[0]);
                                $methodName = explode("@", $item["route"])[1];
                                include_once "apps/controllers/".$fileName.".php";
                                $ref = new \ReflectionClass(ucfirst($fileName));
                                $obj = $ref->newInstance();
                                $obj->$methodName();
                            }
                        }
                    }
                    else {
                        $status = false;
                        foreach($this->routes[$this->checkMethod()] as $item) {
                            $status = false;
                            if (strpos($uri, $item["uri"]) > -1 && $item["uri"] != "/") {
                                $status = true;
                                if (count($item["params"]) == 0) {
                                    $fileName = strtolower(explode("@", $item["route"])[0]);
                                    $methodName = explode("@", $item["route"])[1];
                                    include_once "apps/controllers/".$fileName.".php";
                                    $ref = new \ReflectionClass(ucfirst($fileName));
                                    $obj = $ref->newInstance();
                                    $obj->$methodName();
                                    break;
                                }
                                else {
                                    // Add Params Value
                                    $uriDataID = 0;
                                    $newUriData = array();
                                    $maxIndex = count(explode("/", $item["uri"]));
                                    foreach($uriSegment as $uriIndex => $uriValue) {
                                        if ($uriIndex < $maxIndex) continue;
                                        $newUriData[$item["params"][$uriDataID]] = $uriValue;
                                        $uriDataID++;
                                    }

                                    // Call Method
                                    $fileName = strtolower(explode("@", $item["route"])[0]);
                                    $methodName = explode("@", $item["route"])[1];
                                    include_once "apps/controllers/".$fileName.".php";
                                    $ref = new \ReflectionClass(ucfirst($fileName));
                                    $obj = $ref->newInstance();
                                    $obj->$methodName($newUriData);
                                    break;
                                }
                            }
                        }

                        if (!$status) {
                            include_once "apps/controllers/error.php";
                            $ref = new \ReflectionClass("Error");
                            $obj = $ref->newInstance();
                            $obj->_not_found();
                        }
                    }
                }
                else {
                    echo "Method Is Not Defined";
                }
            }
        }

        public function getURL() {
            return $_SERVER["QUERY_STRING"];
        }

        public function checkMethod() {
            if (isset($_POST["_method"])) {
                if (isset($_POST["_csrf"])) {
                    $method = $_POST["_method"];
                    return strtolower($method);
                }
                return null;
            }
            else if(isset($_POST["_csrf"])) {
                return "post";
            }
            else {
                return "get";
            }
        }
    }

?>
