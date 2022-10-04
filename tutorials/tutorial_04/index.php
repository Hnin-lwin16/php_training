<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form{
            width: 200px;
            margin:0 auto;
        }
        p{
            font-size: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
  <form action="" method="post">
  <label for="Name">Name:</label>
  <input type="text" name="name" required>
  <br>
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" required>
  <br>
  <br>
  <input type='submit' name='login' value='Login'>
  </form>
</body>
</html>
<?php
    if (isset($_POST['login'])) {
        session_start();
        $_SESSION['name'] = "Hnin";
        $_SESSION['password'] = "hnin@123";
        if (($_POST['name'] == $_SESSION['name']) and ($_POST['password'] == $_SESSION
        ['password'])) {
            $_SESSION["sucess"] = "Login Sucess";
            header('Location: logout.php');
        } else {
            echo "<p>Login failed</p>";
        }
    }
?>