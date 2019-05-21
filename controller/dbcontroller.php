<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "raclettev2.scm.azurewebsites.net";
    private $db_name = "raclettev2";
    private $username = "azure";
    private $password = "6#vWHD_$";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
 
}
?>