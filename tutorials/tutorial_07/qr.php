<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR code</title>
    <style>
        .container{
        width: 50% !important;
        margin: 10px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .form-control{
            width: 400px !important;
            height: 40px;
            
        }
        img{
            width: 200px;
            height: 200px;
            margin:0 auto;
            display: block;
            text-align: center;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</
                        label>
                        <input type="text" class="form-control" id="exampleInputName" 
                        name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLocation" class="form-label">Location</
                        label>
                        <input type="text" class="form-control" 
                        id="exampleInputPassword1" name="local">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Generate 
                    QR code</
                    button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
<?php
    require "phpqrcode/qrlib.php";
    if (isset($_POST['submit'])) {
        if (empty($_POST['name'] and $_POST['local'])){
            echo "No data!";
        } else {
            $name = $_POST['name'];
            $location = $_POST['local'];
            $path = "qr-image/";
            $add = $name."\n";
            $add .= $location."\n";
            $file_name = $path.md5($add).".png";
            QRcode::png($add,$file_name);
            echo '<img src="'.$path.basename($file_name).'">';
        }
    }
   

?>