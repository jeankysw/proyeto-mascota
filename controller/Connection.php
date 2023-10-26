 <?php

    class DatabaseConnection {
    
        public function __construct() {
            $this->servername = $_ENV["SERVER"];
            $this->username = $_ENV["USER"];
            $this->password = $_ENV["PASS"];
            $this->database = $_ENV["DB"];
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        }
    
        public function getConnection() {
            return $this->conn;
        
    }
}
    ?>
    

