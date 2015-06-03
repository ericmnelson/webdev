<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
	//Check to see if score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;

		//Get Correct Answer for this question
		$query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);


		$query = "SELECT * FROM `questions`";
		$totals = $mysqli->query($query);

		$total = $totals->num_rows;

		$row = $result->fetch_assoc();

		$correct_choice = $row['id'];

		if($correct_choice == $selected_choice){
			$_SESSION['score']++;
		}
		echo $total;
		//Check if last question
		if($number == $total){
			header("Location: final.php");
			exit();
		} else{
			header("Location: question.php?n=".$next);
		}
	}