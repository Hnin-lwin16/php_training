<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        input{
        color: #220fed;
        background-color: #ffffff;
        padding: 0;
        margin: 0;
        border: 0;
        text-decoration: underline;
        }
    </style>
</head>
<body>
<?php
    $start = session_start();
    if (isset($_POST['login'])) {
        
        $_SESSION["sucess"] = "Login Sucess";
        echo $_SESSION["sucess"];
        ?>
  <form action="" method="post">
  
  <a href="#login.php"><input type='submit' name='logout' value='Logout'></a>
<?php } else {?>
<?php
  
    header('Location: login.php');
    }
    
?>
</form>
</body>
</html>
<?php
    if (isset($_POST['logout'])) {
        header('Location: login.php');
        session_destroy();
    }
?>
 