<?php include 'database.php' ?>
<?php session_start() ?>

<?php
	//Set Question number
	$number = (int)$_GET['n'];
	if(isset($_GET['p'])){
		$reset = (int)$_GET['p'];
		$_SESSION['score'] = 0;
	}
	// Get Question
	$query = "SELECT * FROM `questions` 
				WHERE question_number = $number";
	//Get Results
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$question = $results->fetch_assoc();

	// Get Question
	$query = "SELECT * FROM `choices` 
				WHERE question_number = $number";
	//Get Results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);


	$query = "SELECT * FROM `questions`";
	$totals = $mysqli->query($query);

	$total = $totals->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PHP Quizzer</title>
	<link rel="stylesheet" href ="css/style.css" type="text/css" />
</head>

<body>
	<header>
		<div class="container">
			<h1> PHP Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question <?php echo $question['question_number']?> of <?php echo $total?></div>
			<p class='question'>
				<?php echo $question['texty']?>
			</p>
			<form method="post" action='process.php'>
				<ul class='choices'>
				<?php while ($row = $choices->fetch_assoc()): ?>
					<li><input name='choice' type='radio' value="<?php echo $row['id']; ?>" /> <?php echo $row["texty"]?> </li>
				<?php endwhile; ?>
				</ul>
				<input type='submit' value='submit' />
				<input type='hidden' name='number' value='<?php echo $number; ?>'/>
			</form>
		</div>
	</main>
	<footer>
		<div class = "container">
			Copyright  &copy; 2014, PHP Quizzer
		</div>
	</footer>
</body>	
</html>

