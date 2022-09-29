<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Age</title>
</head>
<body>
<form action="" method="post">
  <label for="birthday">Birthday:</label>
  <input type="date" id="birthday" name="birthday">
  <input type="submit" name="submit" value="sbmit">
</form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $bday = new DateTime($_POST['birthday']); // Your date of birth
        $today = new Datetime(date('y.m.d'));
        $diff = $today->diff($bday);
        if (empty($_POST['birthday'])) {
            echo "No birthday";
        } elseif ($bday > $today) {
            echo "This is impossible";
        } else {
            echo "Your Birthday : ".$_POST['birthday']."<br>";
            echo "Today : ".date('y.m.d')."<br>";
            echo " Your age :  $diff->y years $diff->m months $diff->d days";
        }
        
    }
?>