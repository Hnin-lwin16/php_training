<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop</title>
    <style>
    p{
        border:1px solid black;
        width : 100px;
        margin: 0 auto;
    }
</style>
</head>
<body>
    
</body>
</html>
<?php
    echo "<p>";
    $star_size = 6;
    for ($i = 0; $i < $star_size; $i++) {
        for ($s=0; $s < $star_size - $i - 1 ; $s++) {  
            echo "&nbsp;&nbsp;";  
        }
        for ($st=0; $st<= 2 * $i ; $st++) {  
            echo "*";  
        }
    echo "<br>";
    }
    $star_reverse = 5;
    for ($i = 0; $i < $star_reverse; $i++) {
        for ($s=0; $s <= $i; $s++) {  
            echo "&nbsp;&nbsp;";  
        }
        for ($st=0; $st< 2 * ($star_reverse - $i ) -1 ; $st++) {  
            echo "*";  
        }
    echo "<br>";
    } 
    echo "</p>";
?>