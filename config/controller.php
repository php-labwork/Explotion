<?php
    namespace MVC\Config;
    use MVC\Config\Request;

    class Controller{
        private $views, $models, $assets, $inputs;
        public function __construct() {
            // Empty Constructor
            $this->views = "apps/views/";
            $this->models = "apps/models/";
            $this->assets = "apps/assets/";
            $this->inputs = new Request();
        }

        // Loader
        private function load($fileName) {
            include_once $fileName;
        }

        // Load View
        protected function view($viewName) {
            $this->load($this->views . $viewName . ".php");
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
    }
?>