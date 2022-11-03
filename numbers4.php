<?php include "header.php";?>
<body>
<?php include "nav.php";?>
<div class="container" style="margin-top: 100px">
<div class="row" style="margin-top: 40px; margin-bottom: 40px;">
<div class="col-lg-12 text-center">
<h1>Can You Make The Math Work? (Bulk Numbers with Goal)</h1>
<br>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center">
<form method="POST" action="numbers4.php">
<input id="startnumber" name="startnumber" type="number" placeholder="Place start number here" min="100" max=""></input>
<input id="endnumber" name="endnumber" type="number" placeholder="Place end number here" min="100" max=""></input>
<input id="goal" name="goal" type="number" placeholder="Place Goal Here" min="1" max=""></input>
<input type="submit"></input>
</form>
</div>
</div>
<?php
$optionsarray = array();
$yesnumberarray = array();
$combinationsarray = array();
$startnumber = $_POST["startnumber"];
$endnumber = $_POST["endnumber"];
$goal = $_POST["goal"];
$difference = $endnumber - $startnumber;
$totalyesnumber = 0;
for ($k = 0; $k < $difference+2; $k++){
	$number = $k+$startnumber-1;
	$optionsarray[$k] = $number;
$length = strlen($number);
$finalarray = array(); /*results*/
//populate array of each digit in $number
$numberarray = array();
$equationarray = array();
for ($i = 0; $i < $length; $i++){
	$numberarray[$i] = substr($number, $i, 1);
}
$finalarray[0][1] = $numberarray[0];
$equationarray[0][1] = $numberarray[0];
$finalarray[1][0] = "jesus";
$equationarray[1][0] = "jesus";
array_push($finalarray[1], ($numberarray[0]+$numberarray[1]));
array_push($finalarray[1], ($numberarray[0]-$numberarray[1]));
array_push($finalarray[1], ($numberarray[0]*$numberarray[1]));
if ($numberarray[1]==0){
	array_push($finalarray[1], (0));
}
else {
	array_push($finalarray[1], ($numberarray[0]/$numberarray[1]));
}
array_push($equationarray[1], ($numberarray[0] . "+" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "-" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "*" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "/" . $numberarray[1]));

	for ($i = 1; $i < ($length-1); $i++){ /* go through the number of digits */
		for ($j=1; $j < (sizeof($finalarray[$i])); $j++){ /* go through results */
			$finalarray[$i+1][0] = "jesus";
			array_push($finalarray[$i+1], ($finalarray[$i][$j] + $numberarray[$i+1]));
			array_push($finalarray[$i+1], ($finalarray[$i][$j] - $numberarray[$i+1]));
			array_push($finalarray[$i+1], ($finalarray[$i][$j] * $numberarray[$i+1]));
			if ($numberarray[$i+1]==0){
			array_push($finalarray[$i+1], $finalarray[$i][$j]);
			}
			else {
			array_push($finalarray[$i+1], ($finalarray[$i][$j] / $numberarray[$i+1]));
			}
		}
	
	}
	$combinationsarray[$k] = (sizeof($finalarray[$length-1])-1);
	$yesnumber = 0;
	for ($i=1; $i < sizeof($finalarray[$length-1], 1); $i++){
		if ($finalarray[$length-1][$i] == $goal){
			$yesnumber++;
			$totalyesnumber++;
		}
		else {
		}
	}
	$yesnumberarray[$k] = $yesnumber;
}
echo "<h1>Goal: " . $goal . "</h1>";
?>
<table id="numbertable" class="display" class="table">
	<thead>
		<tr>
			<th>Number</th>
			<th>Successes</th>
			<th>Total Combinations</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($i=1; $i < sizeof($optionsarray); $i++){
					echo "<tr><td><a href='numbers3.php?sent=" . $optionsarray[$i] . "&sentgoal=" . $goal . "' target='_blank'>" . $optionsarray[$i] . "</a></td><td>" . $yesnumberarray[$i] . "</td><td>" . $combinationsarray[$i] . "</td></tr>";
				}
		?>
	</tbody>
</table>
<h2>Grand Total number of successful combinations:<?php echo $totalyesnumber; ?> </h2>
<br><br>
</div>
<br><br>
<?php include 'footer.php'; ?>