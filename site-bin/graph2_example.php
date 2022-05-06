<?php
 
$arrayFromCSV =  array_map('str_getcsv', file('graph2.csv'));

//print_r($arrayFromCSV);
$dataPoints = array();

//for ($i = 1; $i < count($arrayFromCSV); $i++){
//	for($j = 1; $j < count($arrayFromCSV[$i]); $j+=2){
//		if ($arrayFromCSV[$i][$j] == Null){ // ensures therer are no empty values going in
//			echo "null";
//			echo "<br>";
//		}elseif ($arrayFromCSV[$i][$j] < 10000 and $arrayFromCSV[$i][$j] != Null) { // these seperate the date and the other
//			print_r($arrayFromCSV[$i][$j]);
//			echo "<br>";
//			$dataPoints[] = [
  //          		'x' => $arrayFromCSV[$i][$j+1],
    //            	'y' => $arrayFromCSV[$i][$j],
      //          ];		
		//}
	//}
//}	
$colour = array();

for ($i = 1; $i < count($arrayFromCSV); $i++){
	if ($arrayFromCSV[$i][2] < -0.8){
		array_push($colour, '#00FF00 ');
	}elseif ($arrayFromCSV[$i][2] >= -0.8 and $arrayFromCSV[$i][2] < -0.6) {
		array_push($colour, '#33ff00');
	}elseif ($arrayFromCSV[$i][2] >= -0.6 and $arrayFromCSV[$i][2] < -0.4) {
		array_push($colour, '#66ff00');
	}elseif ($arrayFromCSV[$i][2] >= -0.4 and $arrayFromCSV[$i][2] < -0.2) {
		array_push($colour, '#99ff00');
	}elseif ($arrayFromCSV[$i][2] >= -0.2 and $arrayFromCSV[$i][2] < 0) {
		array_push($colour, '#ccff00');
	}elseif ($arrayFromCSV[$i][2] >= 0 and $arrayFromCSV[$i][2] < 0.2) {
		array_push($colour, '#FFFF00');
	}elseif ($arrayFromCSV[$i][2] >= 0.2 and $arrayFromCSV[$i][2] < 0.4) {
		array_push($colour, '#FFCC00');
	}elseif ($arrayFromCSV[$i][2] >= 0.4 and $arrayFromCSV[$i][2] < 0.6) {
		array_push($colour, '#ff9900 ');
	}elseif ($arrayFromCSV[$i][2] >= 0.6 and $arrayFromCSV[$i][2] < 0.8) {
		array_push($colour, '#ff6600');
	}elseif ($arrayFromCSV[$i][2] >= 0.8 and $arrayFromCSV[$i][2] < 0.9) {
		array_push($colour, '#FF3300');
	}else{
		array_push($colour, '#FF0000');
	}
}


$dataPoints = array();
for ($j = 1; $j < count($arrayFromCSV); $j++){
	$dataPoints[] = [
                'y' => $arrayFromCSV[$j][3],
                'x' => $arrayFromCSV[$j][1] * 1000, //converting to unic timestamp
                'color' => $colour[$j-1],
                'postname' => $arrayFromCSV[$j][0],
                'sentanalysis' => $arrayFromCSV[$j][2]
            ];
}

//print_r($dataPoints);

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Reposts over time"
	},
	axisY: {
		title: "Number of posts",
	},
	axisX: {
		title: "Time",
		gridThickness: 1,

	},
	toolTip:{
        enabled: true,       //disable here
        animationEnabled: true, //disable here
        content: "Postname : {postname},<br/> Sentiment analysis: {sentanalysis}"
      },
	data: [{
		type: "line",
		markerSize: 10,
		xValueFormatString: "dateTime",
		yValueFormatString: "$#,##0.##",
		xValueType: "dateTime",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<p><a href="graph example.php">Graph 1</a></p>
</body>
</html> 