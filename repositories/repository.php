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

?>