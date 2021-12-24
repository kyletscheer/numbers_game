<?php include "header.php";?>

<body>
<?php include "nav.php";?>
<div class="container" style="margin-top: 100px">
<div class="row" style="margin-top: 40px; margin-bottom: 40px;">
<div class="col-lg-12 text-center">
<h1>Can You Make The Math Work? (Single Number with Goal)</h1>
<br>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center">
<form method="POST" action="numbers3.php">
<input id="number" name="number" type="number" placeholder="Place number here" min="100" max=""></input>
<input id="goal" name="goal" type="number" placeholder="Place Goal Here" min="1" max=""></input>
<input type="submit"></input>
</form>
</div>
</div>
<?php
$sent = $_GET["sent"];
$sentgoal = $_GET["sentgoal"];
if (ISSET($sent)){
	$number = $sent;
	$goal = $sentgoal;
}
else {
	$goal = $_POST["goal"];
	$number = $_POST["number"];
}
if (ISSET($number)){
echo "<h1>Number: " . $number . "</h1>";
$length = strlen($number);
$finalarray = array(); /*results*/
//populate array of each digit in $number
$numberarray = array();
$equationarray = array();
for ($i = 0; $i < $length; $i++){
	$numberarray[$i] = substr($number, $i, 1);
}
echo "<h1>Goal: " . $goal . "</h1>";
$finalarray[0][1] = $numberarray[0];
$equationarray[0][1] = $numberarray[0];
$finalarray[1][0] = "jesus";
$equationarray[1][0] = "jesus";
array_push($finalarray[1], ($numberarray[0]+$numberarray[1]));
array_push($finalarray[1], ($numberarray[0]-$numberarray[1]));
array_push($finalarray[1], ($numberarray[0]*$numberarray[1]));
array_push($finalarray[1], ($numberarray[0]/$numberarray[1]));
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
			array_push($finalarray[$i+1], ($finalarray[$i][$j] / $numberarray[$i+1]));
			$equationarray[$i+1][0] = "jesus";
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "+" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "-" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "*" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "/" . $numberarray[$i+1]));
		}
	}
echo "<h4>Total number of combinations = " . (sizeof($finalarray[$length-1])-1) . "</h4>";
?>
<table id="numbertable" class="display" class="table">
	<thead>
		<tr>
			<th>Successful?</th>
			<th>Equation</th>
			<th>Result</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$yesnumber = 0;
			for ($i=1; $i < sizeof($finalarray[$length-1], 1); $i++){
				if ($finalarray[$length-1][$i] == $goal){
					echo "<tr><td>Yes</td><td>" . $equationarray[$length-1][$i] . "</td><td>" . $finalarray[$length-1][$i] . "</td></tr>";
					$yesnumber++;
				}
				else {
					echo "<tr><td>No</td><td>" . $equationarray[$length-1][$i] . "</td><td>" . $finalarray[$length-1][$i] . "</td></tr>";
				}
			}
	}
	else {
	}
		?>
	</tbody>
</table>
<br><br>
<h2>Total number of successful combinations:<?php echo $yesnumber; ?> </h2>
</div>
<br><br>
<?php include 'footer.php'; ?>