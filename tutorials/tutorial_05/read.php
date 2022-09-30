<?php
    define("R",realpath("."));
    $dir = R."/file";

    $myfile = fopen($dir."/text.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("$dir/text.txt"));
    fclose($myfile);
   
    require "vendor/autoload.php";
    echo "<h1>Content excel file</h1>";
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load("$dir/books.xlsx");
    $sheet = $spreadsheet->getActiveSheet();
    $datas = $sheet->toArray();
    
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    foreach ($datas[0] as $v) {
        echo "<th>$v</th>";
    }
    echo "</tr>";
    for ($i = 1; $i < count($datas); $i++) {
        echo "<tr>";
        foreach($datas[$i] as $v){
            echo "<td>$v</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";

    //CSV
    echo "<h1>Content CSV file</h1>";
    $creader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    $creader->setReadDataOnly(true);
    $spreadc = $creader->load("$dir/csv_sample.csv");
    $sheetc = $spreadc->getActiveSheet();

    $datac = $sheetc->toArray();
    
    echo "<table>";
    echo "<tbody>";
   
    for ($i = 0; $i < count($datas); $i++) {
        echo "<tr>";
        foreach ($datac[$i] as $v) {
            echo "<td>$v</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    
    //World file
    $phpWord = \PhpOffice\PhpWord\IOFactory::load("$dir/CV.docx");
    echo "<br><br><h2>Reading from Document File!</h2>";
    $wread = $phpWord->getSections();
    
    echo "<table>";
    foreach ($wread as $key => $value) {
        $wreadElement = $value->getElements();
        foreach ($wreadElement as $eKey => $eValue) {
            if ($eValue instanceof \PhpOffice\PhpWord\Element\TextRun) {
                $secwreadElement = $eValue->getElements();
                foreach ($secwreadElement as $secoKey => $secValue) {
                    if ($secValue instanceof \PhpOffice\PhpWord\Element\Text) {
                         echo "<td>".$secValue->getText()."</td>";                               
                    }
                }
            }
        }
    }
    echo "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width : 100%;
            border:2px solid  black;
            border-collapse: collapse;
        }
        td:hover{
            background-color: gray;
        }
        td{
                height:50px;
                width:30px;
                border: 2px solid black;
                text-align:center;
            }
    </style>
</head>
<body>
    
</body>
</html>