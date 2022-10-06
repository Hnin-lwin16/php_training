<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
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
    .form-control{
        margin-bottom: 10px;
        width: 250px;
    }
    
  </style>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form class="row row-cols-lg-auto g-3 align-items-center"  
            method="post" >
                <div class="col-12">
                    <label class="visually-hidden" 
                    for="inlineFormInputGroupUsername">Student Name</label>
                    <div class="input-group">
                    
                    <input type="text" class="form-control" name = "name" 
                    id="inlineFormInputGroupUsername" placeholder="Name">
                    
                </div>

               <div class="col-12">
                <input class="form-control" name = "year" type="text"  placeholder="Year">
                </div>

                <div class="col-12">
                <input class="form-control" name = "class" type="text"  
                placeholder="Class">
                </div>

                <div class="col-12">
                <input class="form-control" name = "local" type="text"  
                placeholder="Location">
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
    include 'connect.php';
    $year_arr = ["First Year","Second Year","Third Year","Fourth Year","Fifth Year"];
    $class_arr = ["A","B","C","D"];
    if (isset($_POST['submit'])) {
        if (empty($_POST['name'] and $_POST['year'] and $_POST['class'] and $_POST
        ['local'])) {
            echo "Write complete!";
        } else {
            if (in_array($_POST['class'], $class_arr) and in_array($_POST['year'], 
            $year_arr)){
                $name = trim(htmlspecialchars($_POST['name']));
                $year = htmlspecialchars($_POST['year']);
                $class = htmlspecialchars($_POST['class']);
                $location = trim(htmlspecialchars($_POST['local']));
                $insert = $conn->prepare("INSERT INTO MyStudentData (StudentName, 
                Year, Class, Location) VALUES (?, ?, ?, ?)");
                $insert->bind_param("ssss", $name, $year, $class, $location);
                $insert->execute();
                header("Location:result.php");
                
            } else {
                echo "Error!";
            }  
        }
    }
?>