<?php

// Open a file
$arrayFromCSV =  array_map('str_getcsv', file('assets/upvotedata.csv'));


$colour = array();
$reception = array();

for ($i = 1; $i < count($arrayFromCSV); $i++){
    $percent = ($arrayFromCSV[$i][2] / $arrayFromCSV[$i][1]) * 100;
    if ($percent < 10){
        array_push($colour, '#00FF00 ');
        array_push($reception, 'Abysmal');
    }elseif ($percent >= 10 and $percent < 20) {
        array_push($colour, '#33ff00');
        array_push($reception, 'Extremely Negative');
    }elseif ($percent >= 20 and $percent < 30) {
        array_push($colour, '#66ff00');
        array_push($reception, 'Very Negative');
    }elseif ($percent >= 30 and $percent < 40) {
        array_push($colour, '#99ff00');
        array_push($reception, 'Negative');
    }elseif ($percent >= 40 and $percent < 50) {
        array_push($colour, '#ccff00');
        array_push($reception, 'Slightly Negative');
    }elseif ($percent >= 50 and $percent < 60) {
        array_push($colour, '#FFFF00');
        array_push($reception, 'Slightly Positive');
    }elseif ($percent >= 60 and $percent < 70) {
        array_push($colour, '#FFCC00');
        array_push($reception, 'Positive');
    }elseif ($percent >= 70 and $percent < 80) {
        array_push($colour, '#ff9900 ');
        array_push($reception, 'Very Positive');
    }elseif ($percent >= 80 and $percent < 90) {
        array_push($colour, '#ff6600');
        array_push($reception, 'Extremely Positive');
    }elseif ($percent >= 90 and $percent < 95) {
        array_push($colour, '#FF3300');
        array_push($reception, 'Damn Near Perfect');
    }else{
        array_push($colour, '#FF0000');
        array_push($reception, 'Perfect');
    }
}

// loop through a certain amount depending on the users input, list may need to be sorted as well
// tooltips showing sentiment alyisa


$dataPoints = array();
for ($j = 1; $j < count($arrayFromCSV); $j++){
    $dataPoints[] = [
        'y' => $arrayFromCSV[$j][1],
        'label' => $arrayFromCSV[$j][0],
        'color' => $colour[$j-1],
        'reception' => $reception[$j-1],
    ];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/new-styles.css">
    <link rel="stylesheet" href="css/tablecss.css">

    <title>Home | InFoReddit</title>
    <link rel="icon" type="image/x-image" href="assets/ir_logo_2_iMD_icon.ico">
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Popularity Across Reddit"
                },
                axisY: {
                    title: "Number of up-votes",
                    borderThickness: 2
                },
                axisX: {
                    title: "Post number",
                    tickThickness: 2,
                },
                legend: {
                    horizontalAlign: "centre", // "center" , "right"
                    verticalAlign: "bottom",  // "top" , "bottom"
                    fontSize: 15
                },
                toolTip:{
                    enabled: true,       //disable here
                    animationEnabled: true, //disable here
                    content: "Postname : {label},<br/> Post reception: {reception}"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "",
                    legendText: "controversial",
                    yValueFormatString: "#,##0.## upvotes",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>
    <body>
        <?php $currentPage = 'About Us'?>
        <?php require_once('navigation.php');?>

        <main>
            <div class="content">
                <h1 id="main-title" class="title">InFoReddit</h1>
                <h1 id = "underscore" class="blinking title">_</h1>
                <br>

                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                <div class="chart">
                    <div class="foo blue"></div>
                    <div class="foo purple"></div>
                    <div class="foo wine"></div>
                </div>
                <p><a href="graph2 example.php">Graph 2</a></p>

                <table class="center">
                    <thead>
                    <tr>
                        <th>Picture
                        <th>Name
                        <th>About Me!
                    </thead>
                    <tbody>
                    <tr>
                        <td><img src="assets/6.png" alt="">
                        <td>Rania Christou
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/mat.jpg" alt="">
                        <td>Mathieu Chaperon
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/nick.jpg" alt="">
                        <td>Nicholas Penny
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/tayyeb.jpg" alt="">
                        <td>Tayyeb Rafique
                        <td>Back-End Lead and CS student.
                    <tr>
                        <td><img src="assets/cam.jpg" alt="">
                        <td>Cameron Williams
                        <td>Year 2 Computer Science Student, Cardiff University
                    <tr>
                        <td><img src="assets/morgan.jpg" alt="">
                        <td>Morgan Plumstead
                        <td>Team Leader, Spaceflight fan, Reddit User, Scout Leader, and Soon-to-be Operations Assistant at ATS Controls. Currently a Year 2 CS Student, Cardiff University.
                    <tr>
                        <td><img src="assets/lewis.png" alt="">
                        <td>Lewis Richards
                        <td>Front-End Lead. CS Student Year 2.
                    </tbody>
                </table>
            </div>
        </main>
        <div id="foot">
            <footer>
                <div id="footer-div">
                    <h3 class="left">InFoReddit, the Mid-Fold of the Internet. <br> Created by Team 08 for the CM2305 Module.</h3>
                    <h3 class="right">Cardiff University, 2022</h3>
                </div>
            </footer>
        </div>
    </body>
</html>
