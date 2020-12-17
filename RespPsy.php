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
	$name = $_GET['name'];
	$sql = "SELECT * FROM psychologists WHERE name = '$name'";
	$result = mysqli_query($db, $sql);
	$psy = $result -> fetch_row();
	$postedData = $psy[6];
	$escapedData = mysqli_real_escape_string($db, $postedData);
	$restoredData = str_replace(array('\n','\r'), array("\n",''), $escapedData);
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
			<li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
			<li><a href="RespPsy.php?logout=1">Logout</a></li>
		</ul>
	</nav>

	<div class="row">
		<h1><?php echo $psy[2]; ?></h1>
		<div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
			<iframe src="<?php echo $psy[5]; ?>" height="400px" width="90%" style="border: 1px solid black; margin-right: auto; margin-left: 20px; margin-bottom: 20px;"></iframe>
			<button><a href="contresppsy.php?user_id=<?php echo $_SESSION['userid'] ?>&psy_id=<?php echo $psy[0] ?>">Contact Now</a></button>
		</div>
		<div class="col-lg-8 col-md-8 .col-sm-6 .col-xs-12">
			<p><?php echo nl2br($restoredData); ?></p>
		</div>
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