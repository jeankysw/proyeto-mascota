 <?php

 
    class DatabaseConnection {
     
    
    
        public function getConnection(){
            $servername = $_ENV["SERVER"];
            $username = $_ENV["USER"];
            $password = $_ENV["PASS"];
            $database = $_ENV["DB"];
            $conn = new mysqli($servername, $username, $password, $database);
        
      
        return $conn;
    }
    
    
}
    ?>
    

