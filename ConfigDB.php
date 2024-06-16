<?php
    class databaseConnect {
        private $host = 'localhost';
        private $db_name = 'actividad_1_be';
        private $username = 'root';
        private $password = '';
        private $conn;
    
        public function getConnection() {
            $this->conn = null;
    
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "Connection Error: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }
    $database = new databaseConnect();
    $conn = $database->getConnection();

    // Verifica la conexión
    if ($conn) {
        echo "Successful database connection!";
    } else {
        echo " <br> Error al conectar a la base de datos.";
    }
    
    
    


?>