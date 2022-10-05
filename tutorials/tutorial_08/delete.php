<?php
    include 'connect.php';
    if (isset($_POST['delete'])) {
        echo "ha";
        $id = $_POST['id'];
        $delete = "DELETE FROM  MyStudentData WHERE id='$id'";
        $delete_run = $conn->query($delete);
        if ($delete_run) {
            echo "delete sucess";
            header("Location:result.php");
            
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        header("Location:result.php");
    }
?>
