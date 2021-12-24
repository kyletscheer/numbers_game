<?php include 'header.php'?>
<body>
<style>
select {
   -o-appearance: none;
   -ms-appearance: none;
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   border-color: #ffffff00;
   background-color: #ffffff00;
}
</style>
<script>
function getAnswer() {
  var x = document.getElementById("getanswer");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<div class="container">
<div class="row" style="margin-top: 40px; margin-bottom: 40px;">
<div class="col-lg-12 text-center">
<form action='game.php' method='post'>
Difficulty:
<select id='difficulty' name='difficulty' onchange='if(this.value != 0) { this.form.submit(); }'>
<option>Easy</option>
<option selected="selected">Medium</option>
<option>Hard</option>
<option>Expert</option>
</select>
</form>
<script type="text/javascript">
  document.getElementById('difficulty').value = "<?php echo $_POST['difficulty'];?>";
</script>
<?php
//Version 2.0: change difficulty
//get a random number and answer from an array/database/query
if (!empty($_POST["symbol0"])){
	$inputnumber = $_POST["existingnumber"];
}
else {
	$oneresultpemdasnumbersarray = array();
	if (($file = fopen("oneresultpemdasnumbers.csv", "r")) !== FALSE) {
		while (($oneresultpemdasnumber = fgets($file)) !== FALSE) {
			 $oneresultpemdasnumbersarray[] = $oneresultpemdasnumber;
		}
		fclose($file);  
	}
	else{}
	if (!empty($_GET['difficulty'])){
		$difficulty = $_GET['difficulty'];
	}
	else {
		$difficulty = $_POST['difficulty'];
	}
	switch($difficulty) {
		case "Easy":
			$requesteddigits = 3;
			break;
		case "Medium":
			$requesteddigits = 4;
			break;
		case "Hard":
			$requesteddigits = 5;
			break;
		case "Expert":
			$requesteddigits = 6;
			break;
		default:
			$requesteddigits = 4;
	}
	while ((strlen($inputnumber)-2) != $requesteddigits){
	$inputnumber = $oneresultpemdasnumbersarray[array_rand($oneresultpemdasnumbersarray)];
	}
	$inputnumber = substr($inputnumber, 0, (strlen($inputnumber)-2));
}
$number = substr($inputnumber, 0, (strlen($inputnumber)-1));
$answer = substr($inputnumber, (strlen($inputnumber)-1));
//convert the number to single digits array
$length = strlen($number);
$numberarray = array();
for ($i = 0; $i < $length; $i++){
	$numberarray[$i] = substr($number, $i, 1);
}
//loop those digits so they echo on screen in order. Create dropdown between each for number symbols. Echo "=answer"
echo "<form action='testing.php' method='post'>";
echo "<input type='hidden' id='existingnumber' name='existingnumber' value='" . $inputnumber . "'></input>";
echo "<h1>";
for ($i = 0; $i < $length-1; $i++) {
	echo " " . $numberarray[$i] . " <select id='symbol" . $i . "' name='symbol" . $i . "' required><option style='display:none'</option><option value='+'>+</option><option value='-'>-</option><option value='*'>*</option><option value='/'>/</option><option value='**'>^</option></select> ";
}
echo $numberarray[$length-1] . " = " . $answer . "<br><br>";
//have a "test" button to submit. Version 2.0 - automatic correct detection
echo "</h1>";
echo "<a href='http://numbers.kylescheer.com/testing.php?difficulty=" .$difficulty . "'><input type='button' value='Get New Equation'></a>";
echo "<input type='submit'>  ";
echo "<input type='button' onClick='getAnswer()' value='Get answer'/>";
echo "</form>";
//save symbols into array
if (!empty($_POST["symbol0"])){
	$symbolarray = array();
	for ($i = 0; $i < $length - 1; $i++){
		$symbolarray[$i] = $_POST["symbol$i"];
	}
	//show submitted equation
	$equationstring = "";
	for ($i = 0; $i < $length; $i++){
		$equationstring = $equationstring . $numberarray[$i] . $symbolarray[$i];	
	}
	$equationstring = str_replace("**","^",$equationstring);
	echo $equationstring . " = ";
	//create test formula and echo results
	eval( '$result = (' . $equationstring. ');' );
	echo $result . "<br><br>";
	if ($result == $answer){
		echo "<h3><b>Congrats :) You're right!</b></h3>";
	}
	else {
		echo "<h3><b>Oops :/ looks like that's wrong.</b></h3>";
	}
}
else {}
?>
<div id='getanswer' style='display:none'>
<?php include 'getanswerpemdas.php';?>
</div>
<br>
</div>
</div>
</div>
<?php include 'footer.php'; ?>