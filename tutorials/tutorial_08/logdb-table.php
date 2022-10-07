<?php
error_reporting(E_ALL);
ini_set("display_errors",'1');
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $mydb = "myInfo";
    
    $conn = new mysqli($servername, $username, $password, $mydb);

    $sql = "CREATE TABLE MyInfoData (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Table MyData created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

   ?>