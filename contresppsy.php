<?php
	session_start();
	if (!isset($_SESSION['username'])) {
    	$_SESSION['msg'] = "You must log in first";
    	header('location: login.php');
  	}
  	if (isset($_GET['logout'])) {
    	session_destroy();
    	unset($_SESSION['username']);
    	header("location: login.php");
  	}   
	$db = mysqli_connect('sql203.epizy.com', 'epiz_27479218', '2WHoNQYnWMa', 'epiz_27479218_womensafety');
	if (isset($_GET['user_id']) and isset($_GET['psy_id'])) {
		$user_id = $_GET['user_id'];
		$psy_id = $_GET['psy_id'];
		$query1 = "SELECT * FROM users WHERE user_id='$user_id'";
		$result = mysqli_query($db, $query1);
		$usr = $result -> fetch_row();
		$email = $usr[3];
		$query2 = "INSERT INTO contactpsy (psy_id, user_id, email) VALUES('$psy_id', '$user_id', '$email')";
		mysqli_query($db, $query2);
	}		
?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Women Safety</title>
	<link rel="stylesheet" type="text/css" href="RespPsy.css">
</head>
<body>
	<nav>
		<a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
		<ul>
			<li><a href="physical.php">Physical</a></li>
			<li><a href="newsfeed.php">Mental</a></li>
			<li><a href="contactpsy.php">Contact Psychologist</a></li>
			<li><a href="laws.php">Laws</a></li>
			<li><a href="ngo.php">NGO's</a></li>
			<li><a href="">Hi <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="contresppsy.php?logout=1">Logout</a></li>
		</ul>
	</nav>

	<h3>Contacted Successfully!</h3>

	<div class="footer">
		<div id="socials">
			<h3>Company<span>logo</span></h3>
			<p class="footer-links">
				<a href="index.php">Home</a>
				<a href="physical.php">Physical</a>
				<a href="newsfeed.php">Mental</a>
				<a href="laws.php">Laws</a>
				<a href="ngo.php">NGO's</a>
			</p>
			<p class="footer-company-name">Company Name © 2015</p>
			<div class="footer-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-instagram"></i></a>
			</div>
		</div>
		<div id="feedback">
			<p>Feedback</p>
			<form action="#" method="post">			
				<?php include('errors.php'); ?>
				<input type="text" name="email" placeholder="Email">
				<textarea name="feedback" placeholder="Feedback"></textarea>
				<br>
				<button type="submit" name="feedbackform">Send</button>
			</form>
		</div>
	</div>
</body>
</html>