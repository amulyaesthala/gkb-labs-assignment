<?php
    class Database {
        private static $instance = null;
        private $conn;

        private $servername = "sql6.freesqldatabase.com";
        private $username = "sql6691268";
        private $password = "Yu6BRy6naA";
        private $dbname = "sql6691268";
        private $port = "3306";

        private function __construct() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);

            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        // Get instance method
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new Database();
            }
            return self::$instance;
        }

        // Get connection method
        public function getConnection() {
            return $this->conn;
        }

        // Prevent cloning
        private function __clone() {}
    }
?>
