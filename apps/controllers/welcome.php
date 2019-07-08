<?php
    use MVC\Config\Controller;

    class Welcome extends Controller{
        private $todoModel, $req;
        public function __construct() {
            parent::__construct();
            $this->todoModel = $this->model("todo");
            $this->req = $this->input();
        }
        public function index() {
            $this->view("welcome");
            $this->todoModel->get();
        }
        public function detail($params=array()) {
            echo $this->req->get("p");
        }
    }
?>