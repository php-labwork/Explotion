<?php
    use MVC\Config\Controller;

    class Welcome extends Controller{
        private $dataModel, $req;
        public function __construct() {
            parent::__construct();
            $dataModel = $this->model("welcome_model");
        }
        public function index() {
            $this->view("welcome");
        }
    }
?>