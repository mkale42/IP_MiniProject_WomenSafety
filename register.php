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
			<li><a href="#">Physical</a></li>
			<li><a href="#">Mental</a></li>
			<li><a href="#">Laws</a></li>
			<li><a href="#">NGO's</a></li>
			<li><a href="#">Sign In</a></li>
		</ul>
	</nav>

  <div class="header">
    <h2>Register</h2>
  </div>
  
  <form method="post" action="register.php" class="register">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Name</label>
      <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
    </div>
    <br><br>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    </div>
    <br><br><br>
    <div id="role">
      <label>Role</label><br><br>
      <input type="radio" id="user" name="role" value="user" class="radio-btn">
      <label for="user">User</label><br><br>
      <input type="radio" id="admin" name="role" value="admin" class="radio-btn">
      <label for="admin">Admin</label><br><br>
      <input type="radio" id="psychologist" name="role" value="psychologist" class="radio-btn" onclick="checkrole();">
      <label for="psychologist">Psychologist</label><br><br>
    </div>
    <br><br>
    <script type="text/javascript">
      function checkrole() {
        if (document.getElementById('psychologist').checked == true) {
          console.log("Hi");
          createElementforCerti();
          createElementforBio();
        }
      }
      function createElementforCerti() {
        var br = document.createElement("br");
        var label = document.createElement("label");
        var node = document.createTextNode("Provide Certificate image via drive link");
        label.appendChild(node);
        var tag = document.createElement("input");
        tag.setAttribute("id", "certi");
        tag.setAttribute("style", "height:30px; width:93%; padding: 5px 10px; font-size: 16px; border-radius: 5px; border : 1px solid gray; margin-top: 10px; margin-bottom: 20px;");
        var element = document.getElementById("role");
        element.appendChild(br);
        element.appendChild(br);
        element.appendChild(label);
        element.appendChild(tag);
        document.getElementById("certi").type = "text";
        document.getElementById("certi").name = "certificate";
        document.getElementById("certi").value = "<?php echo htmlspecialchars($certificate); ?>";
        console.log(element);
      }
      function createElementforBio() {
        var br = document.createElement("br");
        var label = document.createElement("label");        
        var node = document.createTextNode("Provide bio within 200 words");
        label.appendChild(node);
        var tag = document.createElement("textarea");
        tag.setAttribute("id", "bio");
        tag.setAttribute("style", "margin-top: 10px; width:93%; padding: 5px 10px; font-size: 16px; border-radius: 5px; border : 1px solid gray;")
        var node1 = document.createTextNode("<?php echo htmlspecialchars($bio); ?>");
        tag.appendChild(node1);
        var element = document.getElementById("role");
        element.appendChild(label);
        element.appendChild(tag);
        document.getElementById("bio").rows = "20";
        document.getElementById("bio").cols = "45";
        document.getElementById("bio").name = "bio";
      }
    </script>
    <div class="input-group">
      <label>Contact</label>
      <input type="number" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
    </div>
    <br><br>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password_1">
    </div>
    <br><br>
    <div class="input-group">
      <label>Confirm password</label>
      <input type="password" name="password_2">
    </div>
    <br><br>
    <div class="input-group">
      <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <br><br>
    <p>
      Already a member? <a href="login.php">Sign in</a>
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