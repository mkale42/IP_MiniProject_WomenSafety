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
	$sql = "SELECT * FROM psychologists WHERE approved=1";
	$result = mysqli_query($db, $sql);
?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Women Safety</title>
	<link rel="stylesheet" type="text/css" href="contactpsy.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<nav>
		<a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
		<ul>
			<li><a href="physical.php">Physical</a></li>
			<li><a href="newsfeed.php">Mental</a></li>
			<li><a href="#">Contact Psychologist</a></li>
			<li><a href="laws.php">Laws</a></li>
			<li><a href="ngo.php">NGO's</a></li>
			<li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="contactpsy.php?logout=1">Logout</a></li>
		</ul>
	</nav>

	<div class="row">
		<h1>Contact Psychologist</h1>
		<?php
			while ($psys = $result -> fetch_row()) {				
		?>
		<div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
			<h2><?php echo $psys[2]; ?></h2>
			<p><a href="RespPsy.php?name=<?php echo $psys[2]; ?>">View Details</a></p>
		</div>
		<?php
			}
		?>
	</div>

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