<?php include('server.php') ?>
<?php include('feedback.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Women Safety</title>
	<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
	<nav>
		<a href="#" class="logo"><img src="logo.png" height="80px"></a>
		<ul>
			<li><a href="">Physical</a></li>
			<li><a href="">Mental</a></li>
			<li><a href="">Laws</a></li>
			<li><a href="">NGO's</a></li>
			<li><a href="">Sign In</a></li>
		</ul>
	</nav>

  <div class="header">
    <h2>Login</h2>
  </div>
  <form method="post" action="login.php" class="login">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Email</label>	
      <input type="email" name="email" >
    </div>
    <br><br>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <br><br><br>
    <div id="role">
      <label>Role</label><br><br>
      <input type="radio" id="user" name="role" value="user" class="radio-btn">
      <label for="user">User</label><br><br>
      <input type="radio" id="admin" name="role" value="admin" class="radio-btn">
      <label for="admin">Admin</label><br><br>
      <input type="radio" id="psychologist" name="role" value="psychologist" class="radio-btn">
      <label for="psychologist">Psychologist</label><br><br>
    </div>
    <br><br><br>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>

	<div class="footer row">
		<div id="socials">
			<h3>Company<span>logo</span></h3>
			<p class="footer-links">
				<a href="#">Home</a>
				<a href="#">Physical</a>
				<a href="#">Mental</a>
				<a href="#">Laws</a>
				<a href="#">NGO's</a>
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