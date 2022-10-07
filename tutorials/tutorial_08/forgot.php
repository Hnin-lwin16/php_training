<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
        
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    include 'log-connect.php';
    $error = '';
    $url = "http://localhost/php_training/tutorials/tutorial_08/new-pass.php?id=1";
    $select = "SELECT * FROM MyInfoData";
    $s_result = $conn->query($select);
    $row = $s_result->fetch_assoc();
    if (isset($_POST['Next'])) {
        if ($_POST['email'] === $row['email']) {
            $mail = new PHPMailer(true);
            try {
                    //Server settings
                    //Enable verbose debugoutput
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                    $mail->isSMTP();         //Send using SMTP
                    //Set the SMTP server to send through
                    $mail->Host       = 'smtp.gmail.com'; 
                    $mail->SMTPAuth   = true; //Enable SMTP authentication
                    $mail->Username   = 'hninmohmohlwin16@gmail.com'; //SMTP username
                    $mail->Password   = 'zkvbprybudsotwaz';//SMTP password
                    //Enable implicit TLS encryption
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
                    //TCP port to connect to; use 587 if you have set `SMTPSecure =                   PHPMailer::ENCRYPTION_STARTTLS
                    $mail->Port       = 465;
                    
                    //Recipients
                    $mail->setFrom('hninmohmohlwin16@gmail.com', 'Mailer');
                    $mail->addAddress($_POST['email']);//Add a recipient
                       
                    //Content
                    $mail->isHTML(true); //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    =  $url;
                       
                    
                    $mail->send();
                    echo 'Message has been sent';
                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            $error = "<div>We have sent</div>";
            
        } else {
            $error = "<div>Something wrong</div>";
            
        }
    } 
?>
<?php
    if (isset($_POST['forget'])) { 
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget</title>
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post">
                <?php echo $error;?>
                <h3>Enter Your Email...</h3>
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</
                        label>
                        <input type="email" class="form-control" id="exampleInputEmail1" 
                        aria-describedby="emailHelp" name="email" placeholder="Email">
                    </div>
                   
                    <button type="submit" class="btn btn-primary" name="Next">Next</button>
                    
                </form>
                
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        header("Location:register.php");
    }
?>
