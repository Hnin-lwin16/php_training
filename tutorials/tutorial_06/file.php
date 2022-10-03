<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <style>
    .container{
        width: 30%;
        margin: 10% auto;
        background-color: gray;
        padding: 20px;
        border-radius: 20px;
    }
    h2{
        color: red;
        text-align: center;
    }
    p{
        margin:0;
        padding: 0;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }
  </style>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post" 
            enctype="multipart/form-data">
                <div class="col-12">
                    <label class="visually-hidden" 
                    for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" name = "name" 
                    id="inlineFormInputGroupUsername" placeholder="Folder Name">
                    </div>
                </div>

                <div class="col-12">
                <input class="form-control" name = "file" type="file" id="formFile">
                </div>

                <div class="col-12">
                    <button type="submit"  name = "submit" class="btn btn-primary">Submit</
                    button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  </body>
</html>
<?php
   if (isset($_POST['submit'])){
        if (empty($_FILES['file']['name'] and $_POST['name'])) {
            echo "<h2>No data!</h2>";
        } else {
            $fileName = $_FILES['file']['name'];
            $tempFile = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileEx = explode(".",$fileName);
            $fileExt = end($fileEx);
            
            $folder = $_POST["name"];
            if (checkMimeType($tempFile)) {
                if (!file_exists($folder)) {
                    if (is_uploaded_file($tempFile)) {
                        echo "<p>Temp file uploaded</p><br>";
                    }
                    mkdir($folder);
                    $newFile = md5(time().$fileName).".".$fileExt;
                    $newDir = $folder."/".$newFile;
                    if (move_uploaded_file($tempFile,$newDir)) {
                        echo "<p>Already uploaded</p>";
                    } else {
                        echo "<h2>No upload!<h2>";
                    }
                } else {
                    echo "<h2>Same folder!<h2>";
                }
            } else {
                echo "<h2>This is not image!<h2>";
            }
        }
    }
    function checkMimeType($check)
    {
    $allow = [
        "image/jpeg",
        "image/png",
        "image/gif"
    ];
    if (in_array(mime_content_type($check),$allow)) {
        return true;
    } else {
        return false;
    }
    }
?>