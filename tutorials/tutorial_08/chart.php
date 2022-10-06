<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 300px;
            height:300px
        }
        a{
            text-decoration: none;
            background-color: #9f9fef;
            color: white;
            display: inline-block;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",'1');
        include 'connect.php';
       
        $class_count = $conn->query("SELECT COUNT(id) as line, Class as room FROM 
        MyStudentData GROUP BY room");
        foreach ($class_count as $co) {
            $student_class[] = $co['line'];
            $class_arr[] = $co['room'];
        }
    ?> 
    <a href='result.php'>View Result</a> 
    <div>   
    <canvas id="myChart" width="200" height="200"></canvas>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($class_arr) ?>,
        datasets: [{
            label: '# of Student_count',
            data: <?php echo json_encode($student_class) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });
</script>
</body>
</html>