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
  if (isset($_GET['reportu'])) {
  	if (isset($_SESSION['userid'])) {
  		$userid = $_SESSION['userid'];
  	}
  	else {
  		$userid = 0;
  	}
  	if (isset($_SESSION['psyid'])) {
  		$psyid = $_SESSION['psyid'];
  	}
  	else {
  		$psyid = 0;
  	}
  	$postid	= $_GET['reportu'];
  	$postpid = 0;
  	$query = "INSERT INTO reports (post_id, postp_id, user_id, psy_id) VALUES('$postid', '$postpid', '$userid', '$psyid')";
  	mysqli_query($db, $query);
  }

  if (isset($_GET['reportp'])) {
  	if (isset($_SESSION['userid'])) {
  		$userid = $_SESSION['userid'];
  	}
  	else {
  		$userid = 0;
  	}
  	if (isset($_SESSION['psyid'])) {
  		$psyid = $_SESSION['psyid'];
  	}
  	else {
  		$psyid = 0;
  	}
  	$postpid = $_GET['reportp'];
  	$postid = 0;
  	$query = "INSERT INTO reports (post_id, postp_id, user_id, psy_id) VALUES('$postid', '$postpid', '$userid', '$psyid')";
  	mysqli_query($db, $query);
  }

?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Women Safety</title>
  <link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
  <nav>
    <?php if (isset($_SESSION['userid'])) { ?>
    <a href="index.php" class="logo"><img src="logo.png" height="80px"></a>
    <?php } ?>
    <?php if (isset($_SESSION['psyid'])) { ?>
    <a href="psyindex.php" class="logo"><img src="logo.png" height="80px"></a>
    <?php } ?>
    <ul>
      <li><a href="physical.php">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="report.php?logout=1">Logout</a></li>
    </ul>
  </nav>
  <p style="margin-left: 20px; margin-top: 20px; margin-bottom: 100px;">REPORT SENT SUCCESSFULLY!</p>
  <a href="newsfeed.php" style="color: blue;">Click to go back to newsfeed</a>
  <div class="footer row">
    <div id="socials">
      <h3>Company<span>logo</span></h3>
      <p class="footer-links">
        <?php if (isset($_SESSION['userid'])) { ?>
        <a href="index.php">Home</a>
        <?php } ?>
        <?php if (isset($_SESSION['psyid'])) { ?>
        <a href="psyindex.php">Home</a>
        <?php } ?>
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