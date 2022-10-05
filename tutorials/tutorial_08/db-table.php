<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $mydb = "myStudentInfo";
    
    $conn = new mysqli($servername, $username, $password, $mydb);

    $sql = "CREATE TABLE MyStudentData (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        StudentName VARCHAR(255) NOT NULL,
        Year VARCHAR(255) NOT NULL,
        Class VARCHAR(255) NULL,
        Location VARCHAR(255) NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Table MyData created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

   ?>