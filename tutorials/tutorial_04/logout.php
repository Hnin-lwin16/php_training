<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        form{
            width: 55px;
            margin: 0 auto;
        }
        input{
            color: #220fed;
            background-color: #ffffff;
            padding: 0;
            margin: 0;
            border: 0;
            text-decoration: underline;
            text-align: center;
        }
        p{
            font-size: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    session_start(); 
    if ($_SESSION['sucess'] == "Login Sucess") {
        echo "<p>".$_SESSION['sucess']."</p>";
?>
  <form action="" method="post">
  <input type='submit' name='logout' value='Logout'>
  </form>
<?php } else {
        header('Location: index.php');
    }
?>
</body>
</html>
<?php
    if (isset($_POST['logout'])) {
        header('Location: index.php');
        session_destroy();
    }
?>
