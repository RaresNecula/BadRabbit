<?php
include "repository.php";

class UserRepository extends BaseRepository{
    function getByEmail($email) {
        $conn = $this->getDbConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    function add($user) {
        $conn = $this->getDbConnection();
        $insertSQL = "INSERT INTO users(first_name,last_name,email,password ) values(?,?,?,?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("ssss",$user->firstName,$user->lastName,$user->email,$user->password);
        $stmt->execute();
        $stmt->close();
    }
}
?>