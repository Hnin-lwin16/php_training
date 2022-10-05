<?php
    include 'connect.php';
    $select = $conn->prepare("SELECT * FROM MyStudentData");
    $select->execute();
    $result = $select->get_result();
    echo "<a href='index.php'>Create Data</a>";
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Student Name</th>";
    echo "<th>Year</th>";
    echo "<th>Class</th>";
    echo "<th>Location</th>";
    echo "<th>Action</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>".$row["StudentName"]."</td>
        <td>".$row["Year"]."</td>
        <td>".$row["Class"]."</td>
        <td>".$row["Location"]."</td>
        <td>
        <form method='post' action='delete.php'>
        <input type='hidden' name='id' value='".$row["id"]."'>
        <input type='submit' name='delete' value='Delete'>
        </form> 
        <form method='post' action='edit.php'>
        <input type='hidden' name='id' value='".$row["id"]."'>
        <input type='submit' name='edit' value='Update'>
        </form> 
        </td>
        </tr>";
    }
    echo "</tbody>";
    echo "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        table{
            border:1px solid black;
            border-collapse: collapse;
            width: 100%;
        }
        tr{
            height:50px;
        }
        td,th{
                border:1px solid black;
                text-align:center;
        }
        .table{
            margin:0;
            display: flex;
            justify-content: space-around;
        }
        form{
            display: inline-block;
            margin-bottom: 0;
        }
        input{
            padding: 5px 10px;
            border-radius: 3px;
            border:1px solid #808080;
        }
        a{
            text-decoration: none;
            background-color: #9f9fef;
            color: white;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        tbody tr:hover{
            background-color: #efeeee;
        }

    </style>
</head>
<body>
    
</body>
</html>