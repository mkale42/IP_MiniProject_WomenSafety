<?php 
	$email = '';
	$feedback = '';
	$errors = array();
	$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
	if (isset($_POST['feedbackform'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$feedback = mysqli_real_escape_string($db, $_POST['feedback']);

		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($feedback)) { array_push($errors, "Feedback is required"); }

		if (count($errors) == 0) {
			$query = "INSERT INTO feedbacks(email, feedback) VALUES('$email', '$feedback')";
			mysqli_query($db, $query);
		}
	}
?>