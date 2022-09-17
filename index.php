<?php include "header.php";?>
<body>
<?php include "nav.php"?>
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3">Make the Math Work</h1>
        <p>This site gives you a chance to see if a series of numbers, such as the time (12:35) can become an equation (1*2+3=5). Why you may ask? I'll let you know as soon as I find out the answer myself.</p>
		<!--<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
		<p><i>Note: This can't see equations combining numbers such as 1234 working out via 12/3=4 or 3811 being 3+8=11 (for now).</i></p>
	</div>
</div>
<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Single Number</h5>
					<p class="card-text">Put in a number. See if the digits in the number can make an equation that equals the number's final digit.</p>
					<a href="numbers.php" class="btn btn-primary">See It In Action</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Bulk Numbers</h5>
					<p class="card-text">Put in a starting number and ending number. It will check the # of successful equations for all of the numbers between starting number and ending number.</p>
					<a href="numbers2.php" class="btn btn-primary">Take Me There</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Single Number with Goal</h5>
					<p class="card-text">Don't want the digits in a number to add up to the final digit? Now you can set what you want the equation to add up to.</p>
					<a href="numbers3.php" class="btn btn-primary">Check it Out</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Bulk Numbers with Goal</h5>
					<p class="card-text">Put in a starting number, ending number, and goal. It will check the # of successful equations to reach that goal for all of the numbers between starting number and ending number.</p>
					<a href="numbers4.php" class="btn btn-primary">See the Magic</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Numbers Game</h5>
					<p class="card-text">I'll give you a series of numbers, and you figure out the equation to get there.</p>
					<a href="game.php" class="btn btn-primary">Get Ready to Play</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Single Number (PEMDAS Edition)</h5>
					<p class="card-text">Put in a number. See if the digits in the number can make an equation that equals the number's final digit. RESPECTS PEMDAS.</p>
					<a href="numbers5.php" class="btn btn-primary">Take A Spin</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Bulk Number (PEMDAS Edition)</h5>
					<p class="card-text">Put in a starting number and ending number. It will check the # of successful equations for all of the numbers between starting number and ending number. RESPECTS PEMDAS.</p>
					<a href="numbers6.php" class="btn btn-primary">See What's Happening</a>
				</div>
			</div>
		</div>
	</div>
    <hr>
</div> <!-- /container -->
<?php include 'footer.php'; ?>