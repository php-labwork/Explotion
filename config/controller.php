<?php
    namespace MVC\Config;

    class Controller{
        private $apps, $views, $models, $assets, $inputs;
        public function __construct() {
            // Empty Constructor
            $this->apps = "apps/";
            $this->views = "apps/views/";
            $this->models = "apps/models/";
            $this->assets = "apps/assets/";
            $this->inputs = new Request();
        }

        // Loader
        private function load($fileName, $data=array()) {
            if (count($data) > 0) {
                extract($data, EXTR_PREFIX_SAME, "wddx");
            }
            include_once $fileName;
        }

        // Load View
        protected function view($viewName, $data=array()) {
            $this->load($this->views . $viewName . ".php", $data);
        }

        // Load Model
        protected function model($modelName) {
            $this->load($this->models . $modelName . ".php");
            $ref = new \ReflectionClass(ucfirst($modelName));
            $obj = $ref->newInstance();
            return $obj;
        }

        // Load Assets
        protected function asset($assetName) {
            return $this->assets . $assetName;
        }

        // Form Parameter
        protected function input() {
            return $this->inputs;
        }

        // Uri 
        protected function uri($route) {
            return $GLOBALS["base_url"] . "?p=" . $route;
        }
    }
?>