<?php

    $class_arr = ["A","B","C","D"];
    $year_arr = ["First Year","Second Year","Third Year","Fourth Year","Fifth Year"];
    include 'log-connect.php';
    $msg = '';
    if (isset($_POST['submit'])) {
        $select = "SELECT * FROM MyInfoData";
        $s_result = $conn->query($select);
        $row = $s_result->fetch_assoc();
       
        if ($_POST['name'] === $row['name'] and $_POST['email'] === $row['email'] and 
        $_POST['password'] === $row['password']) { 
?>
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
        select{
            margin-bottom: 10px;
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

                <!--<div class="col-12">
                    <input class="form-control" name = "year" type="text"  
                    placeholder="Year">
                    </div>-->
                    <select class="form-select" aria-label="Default select example" 
                    name="year">
                        <option selected>Select Year</option>
                        <option value="1" ><?php echo $year_arr[0];?></option>
                        <option value="2" ><?php echo $year_arr[1];?></option>
                        <option value="3"><?php echo $year_arr[2];?></option>
                        <option value="4"><?php echo $year_arr[3];?></option>
                        <option value="5"><?php echo $year_arr[4];?></option>
                    </select>
                    <!--<div class="col-12">
                    <input class="form-control" name = "class" type="text"  
                    placeholder="Class">
                    </div>-->
                    <select class="form-select" aria-label="Default select example" 
                    name="class">
                        <option selected>Select Class</option>
                        <option value="1" ><?php echo $class_arr[0];?></option>
                        <option value="2" ><?php echo $class_arr[1];?></option>
                        <option value="3" ><?php echo $class_arr[2];?></option>
                        <option value="4" ><?php echo $class_arr[3];?></option>
                    </select>
                    <div class="col-12">
                    <input class="form-control" name = "local" type="text"  
                    placeholder="Location">
                    </div>
                    <div class="col-12">
                        <button type="submit"  name = "submit" class="btn 
                        btn-primary">Submit</
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
    } else {
            header("Location:register.php");
        }
       
    }
?>
<?php
    include 'connect.php';
    
    
    
    if (isset($_POST['submit'])) {
        $c = $_POST['class'];
        $cadd = '';
        switch ($c) {
            case '1':
                echo $cadd = $class_arr[0];
                break;
            case '2':
                echo $cadd = $class_arr[1];
                break;
            case '3':
                echo $cadd = $class_arr[2];
                break;
            case '4':
                echo $cadd = $class_arr[3];
                break;
            default:
                # code...
                break;
        }
        $y = $_POST['year'];
        $yadd = '';
        switch ($y) {
            case '1':
                echo $yadd = $year_arr[0];
                break;
            case '2':
                echo $yadd = $year_arr[1];
                break;
            case '3':
                echo $yadd = $year_arr[2];
                break;
            case '4':
                echo $yadd = $year_arr[3];
                break;
            case '5':
                echo $yadd = $year_arr[4];
                break;
            default:
                # code...
                break;
        }
        if (empty($_POST['name'] and $yadd and $cadd and $_POST['local'])) {
            echo "Write complete!";
        } else {
            if (in_array($cadd, $class_arr) and in_array($yadd, 
            $year_arr)) {
                $name = trim(htmlspecialchars($_POST['name']));
                $year = htmlspecialchars($yadd);
                $class = htmlspecialchars($cadd);
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