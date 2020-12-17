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

  <h2 style="text-align: center;">NGO DETAILS</h2>  
  <table class="ngo">
    <tr>
      <th>NGO NAME</th>
      <th>LOCATION</th>
      <th>CONTACT</th>
    </tr>
    <tr>
      <td>Udaan</td>
      <td>Mumbai</td>
      <td>945549</td>
    </tr>
    <tr>
      <td>Pari</td>
      <td>Pune</td>
      <td>826875</td>
    </tr>
    <tr>
      <td>Umang</td>
      <td>Mumbai</td>
      <td>995544</td>
    </tr>
    <tr>
      <td>Chiraiyya</td>
      <td>New Delhi</td>
      <td>928976</td>
    </tr>
    <tr>
      <td>Samaaj</td>
      <td>Pune</td>
      <td>75869</td>
    </tr>
    <tr>
      <td>Stree</td>
      <td>Bangalore</td>
      <td>987654</td>
    </tr>
    <tr>
      <td>Beti</td>
      <td>Rajasthan</td>
      <td>8766789</td>
    </tr>
    <tr>
      <td>Aashayein</td>
      <td>Chennai</td>
      <td>827456</td>
    </tr>
    <tr>
      <td>Majlis Manch</td>
      <td>Kolkata</td>
      <td>46578900</td>
    </tr>
    <tr>
      <td>ActionAid</td>
      <td>Mumbai</td>
      <td>097890</td>
    </tr>
  </table>

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