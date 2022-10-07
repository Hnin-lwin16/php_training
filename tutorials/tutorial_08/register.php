<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .forgot{
            border:0;
            color: #0000ff;
            text-decoration: dotted;
            background-color: #f7f7f7;
        }
        .forgot:hover{
            border-bottom: 1px solid #0000ff;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form  action="index.php" method="post">
                <h1>Login Form</h1>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Name</
                    label>
                    <input type="text" class="form-control" id="formGroupExampleInput" 
                    placeholder="Name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</
                        label>
                        <input type="email" class="form-control" id="exampleInputEmail1" 
                        aria-describedby="emailHelp" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</
                        label>
                        <input type="password" class="form-control" 
                        id="exampleInputPassword1" name="password" placeholder="Password">
                        <?php echo $msg; ?>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</
                    button>
                    
                </form>
                
            </div>
            <form action="forgot.php" method="post">
                <button type="submit" class="forgot" name="forget">Forgot 
                    Password</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>