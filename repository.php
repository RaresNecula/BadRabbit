<?php

class BaseRepository {
    function getDbConnection() {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "badrabbit";

        $con = mysqli_connect($host, $user, $password, $dbname);
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            return $con;
        } 
         
    }
}

class UserRepository extends BaseRepository{
    // public function __construct($conn) {
    //     $this->conn = $conn;
    // }

    function getByEmail() {
        $conn = $this->getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    function add() {
        $conn = $this->getDbConnection();
        $insertSQL = "INSERT INTO users(first_name,last_name,email,password ) values(?,?,?,?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("ssss",$fname,$lname,$email,$password);
        $stmt->execute();
        $stmt->close();
    }
}

?>