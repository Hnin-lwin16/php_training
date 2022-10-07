<?php
    include 'log-connect.php';
    $sql = "INSERT INTO MyInfoData (name, email, password)
    VALUES ('Hnin', 'hnin@gmail.com', 'lwin@123')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>