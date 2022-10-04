<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Age</title>
    <style>
        form{
            width: 500px;
            margin: 0 auto;
            text-align: center;
            margin-bottom: 10px;
        }
        p{
            text-align:center;
            font-size: 10px;
            margin:0;
            padding:0;
        }
    </style>
</head>
<body>
<form action="" method="post">
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday">
  <input type="submit" name="submit" value="submit">
</form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $bday = new DateTime($_POST['birthday']); // Your date of birth
        $today = new Datetime(date('y.m.d'));
        $diff = $today->diff($bday);
        if (empty($_POST['birthday'])) {
            echo "<p>No birthday</p>";
        } elseif ($bday > $today) {
            echo "<p>This is impossible</p>";
        } else {
            echo "<p>Your Birthday : ".$_POST['birthday']."</p><br>";
            echo "<p>Today : ".date('y.m.d')."</p><br>";
            echo "<p> Your age :  $diff->y years $diff->m months $diff->d days</p>";
        }
        
    }
?>