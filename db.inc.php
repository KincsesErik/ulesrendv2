
<?php

class DataBase{
    private $servername = "localhost";
    private $username = "phpteszter";
    private $password = "7Cx/QtIPg/Zaoftk";
    private $dbname = "phpteszt"; 

    private $conn;
      
function __construct() {
//create connection
$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);


//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
$this->conn = $conn;
}

public function dbSelect($sql){
    if($result = $this->conn->query($sql)){
        if ($result->num_rows > 0) {
            return $result;
        }
        else {
            return NULL;
        }
    }
    elseif($this->conn->error) {
        die("SQL hiba: " . $this->conn->error);
    }
}
}
?>