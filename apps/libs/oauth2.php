<?php
    namespace MVC\Libs;

    class Oauth2 {
        public function __construct() {

        }

        // Default Authentication
        public function setRole($type=0, $expired=NULL) {
            if ($type == 0) {
                return md5($this->randomString(10)) . "*" . $this->setExpired($expired);
            }
            else if ($type == 1) {
                return hash("sha1", $this->randomString(25), false) . "*" . $this->setExpired($expired);
            }
            else {
                return hash("sha256", $this->randomString(25), false) . "*" . $this->setExpired($expired);
            }
        }

        // Convert Expired To Date Base 64
        private function setExpired($expired) {
            if ($expired != NULL) {
                return base64_encode($expired);
            }
            return NULL;
        }

        private function randomString($length=10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $randomString = ''; 
            
            for ($i = 0; $i < $length; $i++) { 
                $index = rand(0, strlen($characters) - 1); 
                $randomString .= $characters[$index]; 
            } 
            
            return $randomString; 
        }
    }
?>