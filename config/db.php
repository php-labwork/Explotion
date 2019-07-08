<?php
    namespace MVC\Config;
    
    class DB {
        // Preparation
        private $query;
        private $connection;
        public function __construct() {
            $this->setQueryToDefault();
        }

        // Set Connection
        public function conn($host, $username, $password, $db_name) {
            $this->connection = new \mysqli($host, $username, $password, $db_name);
            if ($this->connection->connect_error) {
                die("Connection failed: " . $this->connection->connect_error);
            }
        }

        // Select Argument
        public function select($args) {
            $this->query["select"] = "SELECT " . $args;
        }

        // From Argument
        public function from($args) {
            $this->query["from"] = "FROM ". $args;
        }

        public function where($args) {
            $this->query["where"] = "WHERE ". $args;
        }

        // Get Argument
        public function get($tableName="") {
            if (!empty($tableName)) {
                if (empty($this->query["select"])) {
                    $this->select("*");
                }
                if (empty($this->query["from"])) {
                    $this->from($tableName);
                }
            }
            return $this->query();
        }

        // Insert Argument
        public function insert($tableName, $values=array()) {
            $column = array();
            $value = array();
            foreach($values as $key => $data) {
                array_push($column, $key);
                array_push($value, $data);
            }
            $this->query["insert"] = "INSERT INTO " . $tableName . " (" . implode(', ', $column) . ") VALUES (" . implode(', ', $value) . ")";
            return $this->query();
        }

        // Update Argument
        public function update($tableName, $values=array()) {
            $column = array();
            foreach($values as $key => $data) {
                array_push($column, $key . "=". $data);
            }
            $this->query["update"] = "UPDATE " . $tableName . " SET " . implode(', ', $column);
            return $this->query();
        }

        // Delete Argument
        public function delete($tableName) {
            $this->query["delete"] = "DELETE FROM " . $tableName;
            return $this->query();
        }

        // Execute Query
        public function query() {
            $syntax = implode(" ", $this->query);
            $output = $this->connection->query($syntax);
            $this->setQueryToDefault();
            return $output;
        }

        // Set Query To Default
        private function setQueryToDefault() {
            $this->query = array(
                "select" => "",
                "insert" => "",
                "update" => "",
                "delete" => "",
                "from" => "",
                "join" => "",
                "union" => "",
                "where" => "",
                "group_by" => "",
                "having" => "",
                "order_by" => ""
            );
        }
    }

?>