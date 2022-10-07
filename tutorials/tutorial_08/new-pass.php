<?php
    session_start();
    if (isset($_GET['otp'])) {
        if ($_GET['otp'] == $_SESSION['otp']) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .container{
                width: 30% !important;
                margin: 20px auto;
                background-color: #f7f7f7;
                border-radius: 10px;
                padding: 5px;
            }
            .form-control{
                width: 300px !important;
            } 
            button{
                font-size: 12px !important;
                padding: 5px 10px !important;
                margin-bottom: 10px !important;
            }
            input{
                margin-top: 10px !important;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="post">
                            <h3>Enter New Password</h3>
                            
                            <div class="mb-3">
                                    <label for="exampleInputPassword1" 
                                    class="form-label">New Password</
                                    label>
                                    <input type="password" class="form-control" 
                                    id="exampleInputPassword1" name="password1" 
                                    placeholder="New Password">
                                    <?php echo $msg; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" 
                                    class="form-label">Confirm Password</
                                    label>
                                    <input type="password" class="form-control" 
                                    id="exampleInputPassword1" name="password2" 
                                    placeholder="Confirm Password">
                                    <?php echo $msg; ?>
                                </div>
                                <button type="submit" class="btn btn-primary" 
                                name="submit">Submit</
                                button>
                        </form>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        </body>
        </html>

<?php  
    } }
?>
<?php
    if (isset($_POST['submit'])) {
        include 'log-connect.php';
        if ($_POST['password1'] === $_POST['password2']) {
            $password = $_POST['password1'];
            $select = "SELECT * FROM MyInfoData";
            $s_result = $conn->query($select);
            $row = $s_result->fetch_assoc();
            $update = $conn->prepare("UPDATE MyInfoData SET password=?");
            $update->bind_param('s', $password);
            $update->execute();
            header("Location:register.php");
        } else {
            echo "Error!";
        }
    }
?>
