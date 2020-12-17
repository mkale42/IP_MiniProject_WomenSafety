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
  <link rel="stylesheet" type="text/css" href="physical.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <li><a href="#">Physical</a></li>
      <li><a href="newsfeed.php">Mental</a></li>
      <li><a href="laws.php">Laws</a></li>
      <li><a href="ngo.php">NGO's</a></li>
      <li><a href="profile.php">Hi <?php echo $_SESSION['username']; ?></a></li>
      <li><a href="physical.php?logout=1">Logout</a></li>
    </ul>
  </nav>

  <div class="row">
    <h2>Self-Defence Techniques</h2>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">        
        <p><a href="judo.php"><img src="judom.jpg">JUDO</a></p>
        <!--<p>JUDO<img src="judom.jpg"></p>        -->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="kick.jpg">KICK BOXING</a></p>
        <!--<p>KICK BOXING<img src="kick.jpg"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="ma.png">MARTIAL ARTS</a></p>
        <!--<p>MARTIAL ARTS<img src="ma.png"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="taekwandomain.jpg">TAEKWANDO</a></p>
        <!--<p>TAEKWANDO<img src="taekwandomain.jpg"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="wrestlingmain.jfif">JUDO</a></p>
        <!--<p>WRESTLING<img src="wrestlingmain.jfif"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="jujutsumain.jpg">KARATE</a></p>
        <!--<p>Karate<img src="jujutsumain.jpg"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="kung.png">KUNG FU</a></p>
        <!--<p>KUNG FU<img src="kung.png"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="boxingmain.jpg">BOXING</a></p>
        <!--<p>BOXING<img src="boxingmain.jpg"></p>-->
      </div>
      <div class="col-lg-4 col-md-4 .col-sm-6 .col-xs-12">
        <p><a href="judo.php"><img src="jutsu.jpg">JUTSU</a></p>
        <!--<p>JUTSU<img src="jutsu.jpg"></p>-->
      </div>
  </div>
  <br>
  <br>
  <br>


  <div class="footer">
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