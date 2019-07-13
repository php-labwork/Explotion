<?php
    use MVC\Config\Controller;
    use MVC\Libs\Oauth2;

    class Welcome extends Controller{
        private $dataModel, $req;
        private $auth;
        public function __construct() {
            parent::__construct();
            $this->auth = new Oauth2();
            $dataModel = $this->model("welcome_model");
        }
        public function index() {
            print_r($this->auth->setRole(0, NULL));
            $this->view("welcome");
        }
    }
?>