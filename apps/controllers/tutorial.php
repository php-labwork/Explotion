<?php
    use MVC\Config\Controller;

    class Tutorial extends Controller{
        private $tutorialData;
        public function __construct() {
            parent::__construct();
            $this->tutorialData = $this->model("tutorial_model");
        }

        public function index($data=array()) {
            $this->view("template/header", array(
                "title" => "Tutorial | " . ucfirst($data["id"])
            ));
            $this->view("tutorial/". $data["id"]);
            $this->view("template/footer");
        }

        public function getMenu() {
            return $this->tutorialData->getMenu();
        }
    }
?>