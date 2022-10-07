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
    table{
            border:1px solid black;
            border-collapse: collapse;
            width: 50%;
    }
    td,th{
            border:1px solid black;
            text-align:center;
    }
    .table{
        margin:0;
        display: flex;
        justify-content: space-around;
    }
  </style>
  <body>
<?php
    include 'connect.php';
    $id = $_POST["id"];
    $year_arr = ["First Year","Second Year","Third Year","Fourth Year","Fifth Year"];
    $class_arr = ["A","B","C","D"];
    if (isset($_POST['edit'])) {
        $edit = $conn->query("SELECT * FROM MyStudentData WHERE id = '$id'");
        $row = $edit->fetch_assoc();
?>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form class="row row-cols-lg-auto g-3 align-items-center"  
            method="post" >
            <input type='hidden' name='id' value="<?php echo $row["id"];?>">
                <div class="col-12">
                    <label class="visually-hidden" 
                    for="inlineFormInputGroupUsername">Student Name</label>
                    <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" name = "name" 
                    id="inlineFormInputGroupUsername" placeholder="Name" value="<?php echo 
                    $row["StudentName"]?>" required> </div>
                </div>

                <select class="form-select" aria-label="Default select example" 
                name="year">
                    <option selected>Select Year</option>
                    <option value="1" ><?php echo $year_arr[0];?></option>
                    <option value="2" ><?php echo $year_arr[1];?></option>
                    <option value="3"><?php echo $year_arr[2];?></option>
                    <option value="4"><?php echo $year_arr[3];?></option>
                    <option value="5"><?php echo $year_arr[4];?></option>
                </select>

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
                placeholder="Location" value="<?php echo $row["Location"]?>" required>
                </div>
                <div class="col-12">
                    <button type="submit"  name = "submit" class="btn btn-primary">Update</
                    button>
                </div>
            </form>
            </div>
        </div>
    </div>
<?php
    } else {
        header("Location:result.php");
    }
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
<?php
    include 'connect.php';
    $id = $_POST["id"];
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
    if (isset($_POST['submit'])) {
        if (!empty($_POST['name'] and $yadd and $cadd and $_POST
        ['local'])) {
            if (in_array($cadd, $class_arr) and in_array($yadd, 
            $year_arr)){
                $name = trim(htmlspecialchars($_POST['name']));
                $year = htmlspecialchars($yadd);
                $class = htmlspecialchars($cadd);
                $location = trim(htmlspecialchars($_POST['local']));
                $update = $conn->prepare("UPDATE MyStudentData SET StudentName=?, Year=?, 
                Class=?, Location=? WHERE id=?");
                $update->bind_param('ssssi', $name, $year, $class, $location, $id);
                $update->execute();
                header("Location:result.php");
            } 
        }
    }
?>
