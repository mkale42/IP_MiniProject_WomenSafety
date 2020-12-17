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
?>
<?php include('editprofile.php'); ?>
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
    <?php if (isset($_SESSION['adminid'])) { ?>
    <a href="adminindex.php" class="logo"><img src="logo.png" height="80px"></a>
    <?php } ?>
		<ul>
      <?php if (isset($_SESSION['userid'])) { ?>
			<li><a href="physical.php">Physical</a></li>
			<li><a href="newsfeed.php">Mental</a></li>
			<li><a href="laws.php">Laws</a></li>
			<li><a href="ngo.php">NGO's</a></li>
			<li><a href="#">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="profile.php?logout=1">Logout</a></li>
      <?php } ?>
      <?php if (isset($_SESSION['psyid'])) { ?>
      <li><a href="physical.php">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="#">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="profile.php?logout=1">Logout</a></li>
      <?php } ?>
      <?php if (isset($_SESSION['adminid'])) { ?>      
      <li><a href="#">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="index.php?logout=1">Logout</a></li>
      <?php } ?>
		</ul>
	</nav>

  <div class="header">
    <h2>Profile</h2>
  </div>
  	<form method="post" action="profile.php" class="profile">
    	<div class="input-group">
      		<label>Name</label>
      		<input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
    	</div>
    	<br><br>
    	<div class="input-group">
      		<label>Email</label>	
      		<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    	</div>
    	<br><br>
    	<div class="input-group">
      		<label>Contact</label>
      		<input type="number" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
    	</div>
    	<br><br>
    	<div class="input-group">
      		<label>Password</label>
      		<input type="password" name="password" value="<?php echo htmlspecialchars($password) ?>">
    	</div>
    	<br><br>
    	<?php if (isset($_SESSION['psyid'])) { ?>
    	<label>Certificate Link</label>
    	<input id="certi" type="text" name="certificate" style="height:30px; width:93%; padding: 5px 10px; font-size: 16px; border-radius: 5px; border : 1px solid gray; margin-top: 10px; margin-bottom: 20px;" value="<?php echo htmlspecialchars($certificate); ?>">
    	<label>Bio</label>
    	<textarea id="bio" name="bio" style="margin-top: 10px; width:93%; padding: 5px 10px; font-size: 16px; border-radius: 5px; border : 1px solid gray;" rows="20" cols="45"><?php echo $bio; ?></textarea>
    	<?php } ?>
    	<br><br><br>
    	<div class="input-group">
      		<button type="submit" class="btn" name="edit_profile">Save Changes</button>
    	</div>    
  	</form>

	<div class="footer row">
		<div id="socials">
			<h3>Company<span>logo</span></h3>
			<p class="footer-links">
        <?php if (isset($_SESSION['userid'])) { ?>
				<a href="index.php">Home</a>
				<a href="physical.php">Physical</a>
				<a href="newsfeed.php">Mental</a>
				<a href="laws.php">Laws</a>
				<a href="ngo.php">NGO's</a>
        <?php } ?>
        <?php if (isset($_SESSION['psyid'])) { ?>
        <a href="psyindex.php">Home</a>
        <a href="physical.php">Physical</a>
        <a href="newsfeed.php">Mental</a>
        <a href="laws.php">Laws</a>
        <a href="ngo.php">NGO's</a>
        <?php } ?>
        <?php if (isset($_SESSION['adminid'])) { ?>
        <a href="adminindex.php">Home</a>        
        <?php } ?>
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