<?php
$length = strlen($inputnumber);
//$finalarray = array(); /*results*/
//populate array of each digit in $number
$numberarray = array();
$equationarray = array();
for ($i = 0; $i < $length; $i++){
	$numberarray[$i] = substr($inputnumber, $i, 1);
}
$equationarray[0][1] = $numberarray[0];
$equationarray[1][0] = "jesus";
array_push($equationarray[1], ($numberarray[0] . "+" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "-" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "*" . $numberarray[1]));
array_push($equationarray[1], ($numberarray[0] . "/" . $numberarray[1]));

	for ($i = 1; $i < ($length-2); $i++){ /* go through the number of digits */
		for ($j=1; $j < (sizeof($equationarray[$i])); $j++){ /* go through results */
			$equationarray[$i+1][0] = "jesus";
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "+" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "-" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "*" . $numberarray[$i+1]));
			array_push($equationarray[$i+1], ($equationarray[$i][$j] . "/" . $numberarray[$i+1]));
		}
	
	}
?>
<table class='table'>
	<thead>
		<tr>
			<th>Successful Equation</th>
		</tr>
	</thead>
	<tbody>
		<?php
			for ($i=1; $i < sizeof($equationarray[$length-2], 1); $i++){
				$result = eval("return " .  $equationarray[$length-2][$i] . ";");
				if ($result == $numberarray[$length-1]){
					echo "<tr><td>" . $equationarray[$length-2][$i] . " = " . $result . "</td></tr>";
				}
				else {
				}
			}
		?>
	</tbody>
</table>
<br><br>
</div>
</html>