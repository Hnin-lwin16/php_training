<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial_01</title>
    <style>
       
            table{
                width:400px;
                border:2px solid #000000;
                border-collapse: collapse;
            }
            td{
                height:50px;
                width:30px;
            }
        
    </style>
</head>
<body>
    
<?php
    echo "<table>";
    for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
            
    if ($row % 2 ==0) {
        for ($col = 1; $col <= 8 ; $col++) {
            if ($col % 2 == 0) {
                echo "<td bgcolor=#ffffff></td>";
            } else {
                echo "<td bgcolor=#000000></td>";
            }
            }} else {
        for ($col = 1; $col <= 8 ; $col++) {
            if ($col % 2 == 0) {
                echo "<td bgcolor=#000000></td>";
            } else {
                 echo "<td bgcolor=#ffffff></td>";
            }
            }
            }
    echo "</tr>";
    }
    echo "</table>";
?>
    
</body>
</html>